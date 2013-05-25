# moodle-enrol\_idatabase

An improved Moodle external database enrolment plugin.

It is based on the enrol/database enrolment plugin 
(http://docs.moodle.org/24/en/External\_database\_enrolment)
but with few extra features. See below.

The idea of creating this new enrolment plugin is to use current
Moodle enrol/database plugin version as backend, coexisting both,
and enabling enhanced functionalities that may not all the people need.


## Extra features from enrol/database

* Movement of the course between categories, 
  when the external category field value changes.
* Course movement to a "Deleted courses" category when external course disappears.
* Autocreation of categories and subcategories. TODO.


### Course movement between categories

Default enrol/database plugin uses the category field to specify
where to create the new course.

Differently, this plugin enables the category field value of the course to change
over time. This means that if the category value changes, the course will be
moved to the specified category.

Advantages and uses:

* You may configure different capabilities to different categories, so that
  moving courses between categories, you get applied those capabilities automatically
  to courses under each category.
* You may reflect the status of courses in an institutional manner
  through the external database as categories. For example, 
  active courses (teaching courses), inactive courses (read-only courses).


### Autocreation of categories

When the value of the external field has a value slash (/) separated
(like "Main Category/First Subcategory"), this plugin, if enabled,
creates automatically the whole hierarchy of specified categories.

Following the example, if the actual value is 
"Main Category/First Subcategory" and category autocreation is enabled,
this plugin will create "Main Category" into the specified default category,
and then "First Subcategory" into the "Main Category".


---

Author: Jordi Pujol-Ahulló jordi.pujol@urv.cat
License: GPL version 3 or upper http://www.gnu.org/licenses/gpl.html


