## How to Use the Application?
1. **Setup the Database**: Run the database migrations to set up the necessary tables:
    php artisan migrate
2. **Start the Application**: Launch the Laravel development server:
    php artisan serve
3. **Access the Application**: Open your browser and go to:
    (http://127.0.0.1:8000)
    You will be redirected to the login page.
4. **Register an Admin Account**:
    Click the "Become an Admin" button on the registration page.
    Fill out the required details.
    Check the "Is Admin" checkbox if you want the user to have admin privileges.
    ✅ Checked → User is an Admin
    ❌ Unchecked → User is a Guest
5.  **Login to the System**:
    Use your registered email address and password to log in.
    If the credentials are correct, you will be redirected to the user list.
6. **Logout**:
    To log out, click the "Logout" button at the top of the page.
7. **Additional Features**
    Admin users will have access to all users and their products.
    Guests will have its own products


run php artisan migrate
run php artisan serve
browse 127.0.0.1 it will redirect to login page
register an admin thru button become an admin
check the checkbox is Admin if user is an admin else it will be a guest
to login, use your email address and password
once login and you which to logout, click logout button at the top portion
so on so forth...

## Guiding Principles for Coding with Ease and Efficiency

1. **Enjoy the Coding**: Coding can be challenging, but embrace the process and find joy in solving problems. Every challenge you overcome makes you a better developer.
2. **Follow Best Practices That Work for You**: Adhere to coding standards that make sense for your workflow, even if others have different approaches. Consistency is key.
3. **Write Clear Comments for Complex Code**: If a piece of code is difficult to understand, add meaningful comments to help future developers (or even your future self) grasp its purpose quickly.
4. **Organize Your Project Structure**: Keep admin templates separate from non-admin ones. A well-structured project makes debugging and future modifications much easier..
5. **Style Matters**: Even basic CSS can make a difference. Aim for a clean and visually appealing interface to enhance user experience..
6. **Implement Authentication**: Coding for long hours without rest can lead to headaches, stress, or even burnout. Step away, refresh, and come back with a clear mind.
7. **Take Breaks and Avoid Burnout**: Coding for long hours without rest can lead to headaches, stress, or even burnout. Step away, refresh, and come back with a clear mind.
8. **Think Out Loud**: Whether it's talking to your paper, monitor, or even a wall, verbalizing your thoughts can help clarify ideas and solutions.
9. **Leverage Available Resources**: If you're stuck, seek help from ChatGPT, Google, Stack Overflow, or other trusted sources. Sometimes, a different perspective is all you need.
10. **Break Tasks Into Manageable Pieces**: Carefully read the requirements, break them into smaller tasks, and tackle them one at a time. Completing small steps efficiently leads to a solid final product.

## CRON JOB
* * * * * php /var/www/html/laravel-skill-test/artisan schedule:run >> /dev/null 2>&1

## API Integration

This project integrates with two third-party APIs for adding products:
- [FakeStore API](https://fakestoreapi.com/)
- [Platzi Fake API](https://fakeapi.platzi.com/)

The integration is done through an interface (`ProductInterface`) which allows switching between the two APIs easily.