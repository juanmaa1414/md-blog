## MD Blog  
-Docs in progress-
MD Blog is a CMS (blogging) built on top of Laravel framework and now it's in plenty development stage. There are no alpha or beta yet.

### To Install
- Make a Virtualhost entry with desired name and pointing to the public/ folder of the project. E.g.: mdblog.local
- Create a .env with your database config from copying the env.example file.
- Run the migrations: 
`./artisan migrate`
- Seed the db
`./artisan db:seed`
