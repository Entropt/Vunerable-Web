# Vunerable Website by Entropt

## Requirement

| Vunerabilities | Labs | Web |
| --- | :---:| :---: |
| SQL Injection | <span style="color:green">completed</span> | <span style="color:green">completed</span> | 
| Insecure Deserialization | on-going |  |
| File upload | <span style="color:green">completed</span> | <span style="color:green">completed</span> |  |
| Cross-site scripting | on-going | on-going |
| Server-side template injection |  |  |
| Authentication | on-going |  |

## Bonus:
Race condition (with File Upload)

## Website Analysis:
A website with normal login: <span style="color:green">completed</span> <br>
With picture profile upload in comment: <span style="color:green">completed</span> <br>
A newspaper website: on-going <br>
XSS with comments and searchs: on-going<br>


## Instruction
Change the ownership of the upload directory to user **www-data**: <br>
`sudo chown -R www-data:www-data img/comments`
