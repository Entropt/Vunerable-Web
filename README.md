# Vunerable Website by Entropt


## Requirement
| Vunerabilities | Labs | Web |
| --- | :---:| :---: |
| SQL Injection | completed | completed | 
| Insecure Deserialization | on-going |  |
| File upload | completed | completed |  |
| Cross-site scripting | completed | completed |
| Server-side template injection | completed | on-going |
| Authentication | on-going |  |


## Bonus:
IDOR <br>
Race condition (with File Upload) <br>


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
A newspaper website: on-going <br>
XSS with comments and searchs: on-going <br>


## Instruction
Change the ownership of the upload directory to user **www-data**: <br>
`sudo chown -R www-data:www-data img/comments`
