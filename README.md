# faq

Laravel application to show restricted user level access to user faqs.

## To run the FAQ project:

1. git clone https://github.com/pragjna/faq.git
2. CD into FAQ and run composer install
3. cp .env.example to .env
4. setup database / with sqlite or other 
(https://laravel.com/docs/5.6/database)

### Epic and User Stories

Epic : Implement a feature to the application which allows authorized users to edit/delete questions/answers.

User story 1: As a user, I want to edit only those questions which are directly mapped to the user, so that unauthorized users will not be given edit permissions.

User story 2: As a user, I want to delete only those questions which are directly mapped to the user, so that unauthorized users will not be given delete permissions.

User story 3: As a user, I want to edit only those answers which are directly mapped to the user, so that unauthorized users will not be given edit permissions.

User story 4: As a user, I want to delete only those answers which are directly mapped to the user, so that unauthorized users will not be given delete permissions.