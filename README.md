#Project: Task Management Web Application


Description:
The project involves the creation of a web-based Task Management application using Laravel and Vue.js. This application is designed to assist users in managing tasks efficiently and comes with a set of features to enhance task organization and productivity.

#Key Features:

#Task Management:

Users can easily create tasks, providing details such as titles, descriptions, status, and due dates.
The application supports reading, updating, and deleting tasks, allowing users to maintain an organized task list.

#Task Listing:

The task list provides a clear overview of tasks, including key information such as task titles, statuses, and due dates.
Users have the option to sort tasks by various criteria, such as due date, to better prioritize their work.
Filtering options are available, allowing users to view tasks based on their current status (e.g., "In Progress," "Completed").


#User Authentication:

The application employs user authentication, ensuring that only authenticated users can access its features.


#User-Specific Functionality:

To enhance user experience, the application allows users to manage tasks that belong to them.
Users can edit and view their own tasks, providing a tailored and efficient task management experience.

#Enhanced Features (Optional):

The application features drag-and-drop functionality, enabling users to easily reorder tasks and fine-tune task priorities.
Pagination is implemented for the task list, ensuring smooth navigation through a large number of tasks.
User Interface and Experience:

A user-friendly interface is designed for efficient task management.
The application offers seamless interactions, including inline editing of task details for user convenience.


Documentation:

The project includes comprehensive documentation for users and developers, covering setup instructions and usage guidelines.
Clear explanations are provided for running both the Laravel backend and Vue.js frontend.
Users receive guidance on how to interact with the application, create tasks, and manage their tasks effectively.

### Laravel

Laravel is an open-source PHP web framework.
It follows the MVC (Model-View-Controller) design pattern and provides an expressive and elegant syntax,
making it easy to develop robust and scalable web applications.
Laravel offers built-in features such as database management,
session handling, authentication, form validation, and more.
It promotes clean and well-structured development practices.

### MySQL Database

MySQL is a popular open-source relational database management system.
It is commonly used with web applications to store and manage data.
MySQL provides stability, good performance, and comprehensive SQL language support.
It efficiently handles data operations such as create, read, update, and delete (CRUD)

### VueJS 3

Vue.js is a progressive JavaScript framework for building user interfaces.
Vue.js 3, the latest version,
offers enhanced performance and a more efficient reactivity system compared to its predecessors.
It focuses on creating reusable components and provides a reactive approach for manipulating the Document Object Model
(DOM).
Vue.js simplifies the creation of interactive user interfaces,
supports advanced features like routing and state management, and can be easily integrated into existing applications.

### InertiaJs

InertiaJs is a library that allows you to build web applications by seamlessly combining backend frameworks
(like Laravel) with frontend frameworks
(like Vue.js).
It eliminates the need for creating a RESTFul API
or using AJAX calls to communicate between the frontend and backend parts of the application.
Inertia uses the JSON protocol to send data and maintain application state,
simplifying development and improving performance.

## How to start the project

The project has been scaffolded using Laravel sails

1. Clone the project
    ```shell
    git clone https://github.com/denisakp/SquaHR_url_shortener.git
    cd SquaHR_url_shortener
    ```

2. Install composer dependencies
    ```shell
    composer install
    ```

3. Install Npm dependencies
    ```shell
    npm i
    ```

4. Create e .env file and update its content if needed
    ```shell
    cp .env.example .env
    ```

5. Generate Laravel APP Key
    ```shell
    php artisan key:generate --ansi
    ```

6. Run migrations
    ```shell
    php artisan migrate
    ```

7. Start Laravel server
    ```shell
    php artisan serve
    ```

8. Start Node.js development server
    ```shell
    npm run dev
    ```

9. Open your browser at http://localhost:8000


# Conclusion
This project serves as a demonstration of the candidate's ability to create a full-stack web application for task management, focusing on fundamental functionalities, user experience, and optional enhancements to showcase coding proficiency and problem-solving skills.