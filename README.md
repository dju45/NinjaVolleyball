# Hackathon - 2 Wild Code School
*Wild Code School Orléans - Session February 2018*

# Description

The main objective of the application is to be able to create documents using a WYSIWYG editor, to be able to define variables, and by inserting a tag of the type [variable] to substitute the tags by the contents of the transmitted variable in POST or GET.

The generation of PDF will be done by connecting to the app through authentication and a form.

The documents must respect a very strict layout and incorporate 2 typography: Biondi and Century Gothic.

The application must allow simple authentication, and group management, users will have access to the documents of the groups of which they are members. The administrators will also have the possibility of modifying the documents of the groups of which they are members. Super Administrators have access to all groups.

# Installation

1. Clone the repository from Github : https://github.com/WildCodeSchool/orleans-0218-projetio
2. Run `composer install`.
3. Run `npm install`.
4. Compile Webpack :
    - Development environment : `./node_modules/.bin/encore dev`.
    - Production environment : `./node_modules/.bin/encore production`.


