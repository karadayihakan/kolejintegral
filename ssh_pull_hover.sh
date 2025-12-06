#!/usr/bin/expect -f
set timeout 30
spawn ssh -p 65002 u565201393@145.223.39.216
expect {
    "password:" {
        send "K*QE9U6hxib3.TK\r"
    }
    "Password:" {
        send "K*QE9U6hxib3.TK\r"
    }
}
expect "$ "
send "cd domains/fizetmedya.com/public_html/integral2\r"
expect "$ "
send "git pull\r"
expect "$ "
send "php artisan view:clear\r"
expect "$ "
send "exit\r"
expect eof

