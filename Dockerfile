FROM node:18-alpine

# Фикс для Windows
RUN npm config set script-shell "bash"

WORKDIR /app
COPY package*.json ./

# Установка build-зависимостей
RUN apk add --no-cache python3 make g++

RUN npm install
COPY . .

# Сборка с выводом ошибок
RUN npm run build || (echo "Build failed!"; cat npm-debug.log; exit 1)

# Фикс прав
RUN chown -R node:node /app
USER node

VOLUME /app/dist
