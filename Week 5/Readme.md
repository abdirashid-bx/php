# Week 5 - PHP Forms and File Upload

This week focuses on working with HTML forms and PHP handling, including:
- single select dropdowns
- multiple select dropdowns
- file uploads
- moving uploaded files to a specific folder

## Files in this folder

- Example1.php  
  Demonstrates:
  - single-choice select form
  - multiple-choice select form
  - reading submitted values with `$_POST`

- Files.php  
  Demonstrates:
  - file input form
  - reading uploaded file details using `$_FILES`
  - creating a destination folder
  - moving the uploaded file with `move_uploaded_file()`

## Example1.php

This file shows how to use:
- `<select name="single">` for one selection
- `<select name="multiple[]" multiple>` for multiple selections

It checks:
- whether the user selected a value
- whether the selected values are empty
- how to print the selected result

## Files.php

This file shows how to:
1. Create a form with `enctype="multipart/form-data"`
2. Upload a file using `<input type="file" name="scertificate">`
3. Read uploaded data from `$_FILES`
4. Save the file to a target folder
5. Move the file from the temporary upload folder to the final folder

Important:
- The destination folder must exist or be created first.


## How to run

1. Start XAMPP Apache
2. Open the project in the browser:
   - `http://localhost/php-course/Week 5/select.php`
   - `http://localhost/php-course/Week 5/files.php`

## Notes

- Use `isset()` to check if a form was submitted.
- Use `!empty()` to check if a posted value or uploaded file exists.
- For multiple selections, use `foreach()` to loop through the array.

## Summary

Week 5 introduces:
- form submission
- POST data handling
- select list handling
- file upload handling
- file movement on the server