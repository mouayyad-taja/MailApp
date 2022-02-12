# MailAPP


A simple dashboard for receiving email and sending emails


&nbsp; 


**App Flow:**

&nbsp; 
&nbsp; 

<img width="1440" alt="Screen Shot 2022-02-12 at 3 59 20 PM" src="https://user-images.githubusercontent.com/42350093/153711452-0b92c451-b206-4419-84a2-f4150d2a072c.png">

&nbsp; 

<img width="1440" alt="Screen Shot 2022-02-12 at 4 04 15 PM" src="https://user-images.githubusercontent.com/42350093/153711457-db9bc1f3-d3f1-4891-b693-c76478407d3d.png">


&nbsp; 
&nbsp; 

## Tools And Resources Used
- [Laravel framework](https://laravel.com/).
- [php-imap](https://github.com/Webklex/php-imap) - PHP-IMAP is a wrapper for common IMAP communication without the need to have the php-imap module installed / enabled. The protocol is completely integrated and therefore supports IMAP IDLE operation and the "new" oAuth authentication process as well. You can enable the php-imap module in order to handle edge cases, improve message decoding quality and is required if you want to use legacy protocols such as pop3.


&nbsp; 
&nbsp; 


# Installation

* Installation by cloning the repository
* Go to directory
* Copt .env.example and rename it to .env
* Open terminal located at this directory
* Enter the following commands:
    - composer install
    - php artisan key:generate
    - npm install && npm run dev
    - php artisan serve
* You can change the used email in class App\Http\Controllers\HomeController inside currentConfig array
* Open the browser on http://localhost:8000/ and test the services

&nbsp; 
&nbsp; 
