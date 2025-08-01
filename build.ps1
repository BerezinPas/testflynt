# Шаг 1: Собираем Docker образ
docker build -t flynt-builder .

# Шаг 2: Создаем папку для результатов (если её нет)
New-Item -ItemType Directory -Force -Path .\dist | Out-Null

# Шаг 3: Запускаем контейнер и копируем файлы
docker run --rm `
  -v ${PWD}/dist:/app/dist `
  flynt-builder
