# MyToDo
A simple  todo website created using html, css, js, bootstrap, jquery, ajax, php,     mysql

As a first big projects ? though not a big one , but for me , as it has a big codebase and it has taught me many small bit of information like

1) ".htaccess" file and its importance for eg:

# create the " .htaccess " on root directory of the projects

i) Showing custom error page with just some line of code on different error number like 403, 404, 500 in " .htaccess " file
``
ErrorDocument 403 /all_projects/todo/error_page/403.html
ErrorDocument 404 /all_projects/todo/error_page/404.html
ErrorDocument 500 /all_projects/todo/error_page/500.html

``
ii) Disable directory listing --->>
with just one line of code "Options -Indexes" in .htaccess throw a 404 error when user tries to access directory files (eg: /images directory ) as it 
may be a great security flaw
