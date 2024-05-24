# Vunerable Website by Entropt

## Requirement

| Vunerabilities | Labs | Web |
| --- | :---:| :---: |
| SQL Injection | completed | completed | 
| Insecure Deserialization | on-going |  |
| File upload | completed | completed |  |
| Cross-site scripting | on-going | on-going |
| Server-side template injection |  |  |
| Authentication | on-going |  |

## Bonus:
Race condition (with File Upload)

## Website Analysis:
A website with normal login: completed <br>
With picture upload in comments: completed <br>
A newspaper website: on-going <br>
XSS with comments and searchs: on-going<br>


## Instruction
Change the ownership of the upload directory to user **www-data**: <br>
`sudo chown -R www-data:www-data img/comments`
