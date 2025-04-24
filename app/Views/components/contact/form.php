<?php
/**
 * Contact Form Component
 * 
 * This form is displayed on the Contact page and is used to collect
 * basic information from a user who wants to discuss a project.
 * It includes fields for name, email, phone, and project details.
 * 
 * @formField string $name   The name of the user.
 * @formField string $email  The user's email address.
 * @formField string $phone  The user's phone number.
 * @formField string $project A brief description of the project.
 */
?>

<form
    class="mt-12 text-base xs:text-lg sm:text-xl font-medium leading-relaxed font-in">

    <!-- Name field -->
    Hello! My name is
    <input 
        type="text" 
        name="name" 
        placeholder="your name" 
        required 
        maxlength="80"
        class="outline-none border-0 p-0 mx-2 focus:ring-0 placeholder:text-center placeholder:text-lg border-b border-gray 
        focus:border-gray bg-transparent" 
    />

    <!-- Email field -->
    and I want to discuss a potential project. You can email me at
    <input 
        type="email" 
        name="email" 
        placeholder="your@email" 
        class="outline-none border-0 p-0 mx-2 focus:ring-0 placeholder:text-center placeholder:text-lg border-b border-gray 
        focus:border-gray bg-transparent" 
    />

    <!-- Phone field -->
    or reach out to me on
    <input 
        type="tel" 
        name="phone" 
        placeholder="your phone" 
        class="outline-none border-0 p-0 mx-2 focus:ring-0 placeholder:text-center placeholder:text-lg border-b border-gray 
        focus:border-gray bg-transparent" 
    />

    <!-- Project description -->
    Here are some details about my project: <br />
    <textarea 
        name="project" 
        placeholder="My project is about..." 
        rows="3" 
        class="w-full outline-none border-0 p-0 mx-0 focus:ring-0  placeholder:text-lg border-b border-gray 
        focus:border-gray bg-transparent"
    ></textarea>

    <!-- Submit button -->
    <input 
        type="submit" 
        value="send request"
        class="mt-8 font-medium inline-block capitalize text-lg sm:text-xl py-2 sm:py-3 px-6 sm:px-8 border-2 border-solid border-dark dark:border-light rounded cursor-pointer" 
    />
</form>
