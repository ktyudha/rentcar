
## HOW TO USE

### WINDOWS

---

1. Clone repository ini, dan tempatkan ke `PATH public_html` kalian, jika menggunakan xampp maka ini ada di `htdocs`
2. Lakukan command `composer install`
3. Copy `.env.example` menjadi `.env`
4. Ubah `.env` sesuai dengan pengaturan database anda
5. Lakukan command `php artisan key:generate`
6. Lakukan command `php artisan migrate --seed`
7. Lakukan command `php artisan storage:link`
8. pastikan sudah terinstall node v18
9. run `npm install`
10. run `npm run dev` -> jangan close terminal nya, akan otomatis build ulang ketika ada perubahan

Jika kalian menggunakan `php artisan serve` sebagai tempat untuk menjalankan aplikasi ini, dan kalian menemukan error.
maka gunakan `Virtual Host`, tata cara membuat virtual host ada [di sini](https://www.jurnalweb.com/cara-membuat-virtual-host-di-xampp-windows/),

## HOW TO CONTRIBUTE

---

1. Clone repository ini
2. Lakukan checkout branch sesuai dengan task list yang dikerjakan

