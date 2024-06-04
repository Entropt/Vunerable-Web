# Vunerable Website by Entropt


## Requirement
| Vunerabilities | Labs | Web |
| --- | :---:| :---: |
| SQL Injection | completed | completed | 
| Insecure Deserialization | completed | completed |
| File upload | completed | completed |  |
| Cross-site scripting | completed | completed |
| Server-side template injection | completed | completed |
| Path Traversal | completed | completed |


## Specification
| Specs| Value |
| :--- | :--- |
| OS | Kali Linux |
| Webserver | Nginx |
| Language | PHP |
| Database | MariaDB |


## Website Analysis:
A website with normal login: completed <br>
With picture upload in comments: completed <br>
A newspaper website: done <br>
XSS with comments: done <br>


## Instruction
Change the ownership of the upload directory to user **www-data**: <br>
`sudo chown -R www-data:www-data img/comments`


Note: Insecure Deserialization vulnerability in this lab **only** works on **PHP 7.4** or below because it's PHAR Deserialization.
