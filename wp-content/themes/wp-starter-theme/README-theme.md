# A starter theme for developers

### ├─ **assets/**

* ├─ **css/**
* ├─ **fonts/**
* ├─ **images/**
* ├─ **js/**
    * ├─ **functions.js** - holds useful functions
    * ├─ **init.js** - init your functions only
    * ├─ **vendors.js** - contains minified libraries

### ├─ **base/** - AVOID developing code here!!
* ├─ **hooks/**

    * ├─ **functions.php** - contains a bunch of functions which are used only by hooks to customize or format the theme output

    * ├─ **hooks.php** - this uses the functions from **hooks-func.php**

* ├─ **util/**

    * ├─ **functions.php** - this has useful functions ***please check them before reinvent the wheel***:
        * *ns_print_r()*
        * *ns_get_digits()*
        * *ns_get_last_post()*
        * *ns_get_author_role()*
        * *ns_get_user_data()*
        * *ns_random_string()*
        * *ns_remove_empty_array_values()*
        * *ns_strpos_array()*
        * *ns_get_terms_by_post_type()*
        * *ns_count_sidebar_widgets()*

* ├─ **base.class.php** - contains useful functions and does some actions such as:
    * checking PHP versions
    * enqueue minimal scripts and styles
    * init extensions
    * unregister some useless WP widgets
    * add custom thumbnail sizes
    * contains useful functions ***please check them before reinvent the wheel***:
          * *add_thumbnail_sizes()*
          * *register_menu_locations()*
          * *unregister_types()*
          * *unregister_widgets()*
          * *hide_plugins()*
          * *load_root_folder_files()*

* ├─ **config.php** - holds general configs, please check them out and use them as much as possible to simplify the work

### ├─ **includes/**
**NOTE:** All **.php** files in the root of this folder will be automatically initialized.

To set a file priority order use this comment at the top of file:
```php
<?php //priority: xxx ?>
```
where **xxx** is an index. With a big index the file will be initialized first.

On the other hand to avoid auto including a file either use this comment at the top of file
```php
<?php //exclude: yes ?>
```
or just delete the file

### ├─ **templates/**
Holds default and custom templates
