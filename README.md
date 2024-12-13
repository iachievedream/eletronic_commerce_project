# README

## 1.1修訂紀錄

|序號|修訂時間|修訂內容|修訂人員|
|----|----|----|----|
|1|2024 12 13|初始化 laravel 的專案<br>Set up a fresh Laravel app|charley|
|2|2024 12 13|添加基本套件的安裝<br>feat: install kit<br>Install Breeze|charley|
|3|2024 12 13|添加 docker-compose<br>import docker-compose|charley|
|4|2024 12 13|安裝 Swagger docs<br>feat: install Swagger docs|charley|
|--|----|----|----|

## docker-compose

~~~bash
# 重新構建並啟動容器
docker-compose up --build -d
# 啟動容器
docker-compose up -d
# 關閉容器
docker-compose down
# 查看容器
docker ps

# 查看全部或單一容器的紀錄
docker-compose logs -f
docker logs nginx_container

# 進入容器與執行指令，退出
docker exec -it php_container /bin/bash
php artisan migrate
exit

# 上列三行指令合併為下列指令（綜合）
docker exec -it php_container compose i
docker exec -it php_container php artisan migrate
docker exec -it php_container php artisan migrate:refresh
docker exec -it php_container php artisan db:seed

# 個人製作的執行工具
docker exec -it php_container sh install.sh 
~~~

在 AWS 上 `compose i`不能使用簡稱，  
需要全部名稱 `compose install`

> note:  
第一次啟動專案的時候，  
需要使用 `install.sh` 檔案當中最後一欄指令，  
建立ssl憑證，以及手動使用  
`docker exec -it php_container php artisan migrate:refresh`  
才能順利啟用專案
