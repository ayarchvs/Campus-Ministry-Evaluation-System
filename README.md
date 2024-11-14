# Campus Ministry Evaluation System
 Evaluation Management System


 Website folder 
 ==================
 is for Campus Ministry System (Website)


 Other requirements folder
 ====================================
 is for Diagrams and such


Inside Campus Ministry: Evaluation Form Files
======================================================
tis is where le ggforms will be imported

we might separate it to diff folders.
ex.

Campus Ministry Website Folder\Evaluation Form Files\Retreat
Campus Ministry Website Folder\Evaluation Form Files\Recollection 01
Campus Ministry Website Folder\Evaluation Form Files\Recollection 02


Todo List
======================================================

>[!IMPORTANT]
# 🟢New Features on this update:

## ❄️1. New Feature: View Event btn now works
 -> 1. added btns "view" & "Options" (this was just a link before)
 -> 2.  View now successfully brings you to the event detail page
 -> 3.  And send the corresponding id for reference when selecting "file_name_ref"

.

## ❄️2. fixed: Staff Manager navigation panel cuz lacked script for that one animation and to open da layouts and pages
-> 1. just fixed tiny bug cuz no script

.

## ❄️3. New Feature: Delete Event 
 -> 1. successfully shows popup for final confirmation 
 -> 2. when declined, it doesn't delete
 -> 3. when ok, it deletes and tell that you have successfully deleted 

.

## ❄️4. Feature: Update is now working 
 -> 1. successfully shows current data when trying to update 
 -> 2. updates data base + show a confirmation that tit has been updated
 -> 3. btns has color now

.
## ❄️5. New Feature: Delete Staff Feature now working
 -> 1. successfully shows deletes staff
 -> 2.  shows last confirmation if want to delete
 -> 3. show succesful deletion

.

## ❄️✨6. New Feature: Update staff details succesfulll
 -> 1. successfully shows current data when trying to update 
 -> 2. updates data base + show a confirmation that tit has been updated

.

## ❄️✨6. Kuroe Fixed: Semil: Confirmation for Register 
 -> 1. There is now Confirmation [yes no] for Registering a new staff
 -> 2. (now saves to staff list
 -> 3. has alerts when required field not filled)

.

## ❄️✨7. Changed my Religion XD Fixed: all religion from Catholic to Roman Catholic
  -> 1. changed in main-page.php, add event page, add old event page, and database (for look only)



.
.

# 🟠Next Steps:
## ❄️1. (Semil)   [Event List =  main-page.php]  
 -> make the alternating dark and light color in Event List table similar to staff List

.


 ## ❄️✨~~2. (Kuroe)   [Staff List Management Page - staff-list.php]~~ 
  ~~-> Edit and Delete btns functions~~

.

## ❄️3.  (Semil maybe)  [Add Event (normal ver.) = add-event-.php ]  
 -> 1. fix the handing of missing info (do le pop up message that field is not filled yet )
 -> 2. can get ref from files related to update feature "please fill out on field thing"
 -> 3. do le same thing for no file ref yet

![Image](https://github.com/user-attachments/assets/5e53109f-8438-4b40-bdba-86b554c63f70)



.

## ❄️4. (Unassigned)   [Login = index.php]

.

## ❄️5. (Unassigned)  [Event List = main-page.php] : REQUIRES "AFTER LOGIN"
 -> add which staff created the event in the Event List details (incorporate staff_ID)

.

## ❄️6. (Unassigned)  [Eventlist : Permissions]  Better if after LOGIN
### -> 1. Admin & Developer (same)  
             -> [Basic + Additional Function]:  Staff feature
                    
                         -> 1.  has pages: {Register, Staff List / page}
                         -> 2.  can use these features ^

### -> 2. Staff (same rank) 
               -> [Basic Function] : managing their respective event type
                    
                         -> 1.  has no pages: {Register, Staff List / page}
                         -> 2.  cant use these features

                         -> 3.  Can add, update, & delete their respective event
                         -> 4.  All of them can view any of the events


## ❄️7.  (Kuroe)  [Event Details = event-details.php ]  
 -> 1. use the id sent from main-page.php (iz in the url now) 
 -> 2. Logic: use php to grab that data from url

.
.

# 🔴Not done & Cant do yet (cuz consultation):


## ❄️1. [Event Details]  : Questions for Table and Charts
 -> ask abt client what function they want cuz of limitations
 -> flexible handling but only show charts of each ||  restricted and need to reassess questions into categories but can show over all analytics

(temp action for 1. make a part of it so we have sample and easier to implement after consultation with client)

.

## ❄️2. [Adding Old Data in DB] : need consultation to progress aswell, 
  -> cuz this has a different set of question a lil compared to the google forms 
  -> (ggForms ver has more info cuz it kinda shows u le preview of the file)

.

## ❄️3. When All set Processes of Event Details New (GG forms) and 
    Old (from their doc file: Evaluation results /report current of CMO ) is just similar

.

## ❄ 4. Learn how to export excel file and save the file name of (add old event result) 
  -> remember: categorize le questions too

.
.
 



# ADDITIONAL:  if client picked this route

## ❄️1. Develop Overall Analytics
 -> 1. make new entity in db, Overall Ratings
 -> 2. develop page for Overall Analytics 

.
.



