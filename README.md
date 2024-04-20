TECHINCAL TASK INTERNSHIP SEKAWAN MEDIA

HOW TO USE

WINDOWS


Clone repository ini, dan tempatkan ke PATH public_html kalian, jika menggunakan xampp maka ini ada di htdocs

Lakukan command composer install

Copy .env.example menjadi .env

Ubah .env sesuai dengan pengaturan database anda
Lakukan command php artisan key:generate

Lakukan command php artisan migrate --seed

Lakukan command php artisan storage:link

pastikan sudah terinstall node v18
run npm install

run npm run dev -> jangan close terminal nya, akan otomatis build ulang ketika ada perubahan

Jika kalian menggunakan php artisan serve sebagai tempat untuk menjalankan aplikasi ini, dan kalian menemukan error.
maka gunakan Virtual Host, tata cara membuat virtual host ada di sini, dengan nama domain compro.aksa

LINUX


Clone repository ini, dan tempatkan ke PATH public_html kalian, ini bisa dimana saja bergantung kepada pengaturan virtual host kalian, tetapi biasanya ada di var/www/html, baik yang menggunakan apache maupun nginx

Lakukan command composer install

Copy .env.example menjadi .env

Ubah .env sesuai dengan pengaturan database anda
Lakukan command php artisan key:generate

Lakukan command php artisan migrate --seed

pastikan sudah terinstall node v18
run npm install

run npm run dev -> jangan close terminal nya, akan otomatis build ulang ketika ada perubahan
run php artisan serve -> jangan close terminal nya / atau bisa langsung via webserver


HOW TO CONTRIBUTE


Clone repository ini
Lakukan checkout branch sesuai dengan task list yang dikerjakan
