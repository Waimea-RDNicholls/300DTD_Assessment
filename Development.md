# Development of a Database-Driven Web Application for NCEA Level 3

Project Name: **Game Companion Finder**

Project Author: **Riley Nicholls**

Assessment Standards: **91902** and **91903**


-------------------------------------------------

## Design, Development and Testing Log

### 16/05/2024

Planning Database


![Alt text](images/drawSQL_DB1.png)

Previously, the database looked like this. A few parts were unnecessary (the details table, days table) but the times section seemed overcomplicated. After a discussion with Mr. Copley, we identified the parts that needed changing and altered it to:

![Alt text](images/drawSQL_DB2.png)

2 tables, the details and days tables, were removed. The details were integrated to the users section, as each user will have their one set of their own unique details (therefore there is no point having a second table to represent that). The days table was removed, as it functionally did nothing (you could represent each day with a single column as a number from 1-7). The times table was then altered to have a start time and end time, because having 24 columns for each time was clunky and overcomplicated, as well as inefficient.

<!-- Replace this text with brief notes describing what you worked on, any decisions you made, any changes to designs, etc. Add screenshots / links to other media to illustrate your notes where necessary. -->

<!-- > Replace this text with any user feedback / comments

Replace this text with notes describing how you acted upon the user feedback: made changes to design, etc. -->

### 17/05/2024

High-Level Design/Flow of App

Made 2 drafts of potential app flow and high-level design.
![Alt text](images/highLevelFlow.png)

Design 1 would have a home page, which perhaps would display your profile, your friends, etc. From there, you can access every other menu from which to use the app.
Design 2 would default to the search menu as a home page, meaning you can immediately start searching for other users. It would act as the hub from which to access all other pages.
Design 1 feels more consistent and adaptable, if I need to add something I can add another button to the homepage. However, the main function of the app is to search. I'm unsure if users would want the extra step of going to the filtering page to start using the app.
Curious about whether users would like a button that immediately sends them to the home screen, that can be accessed from any view of the app.

To be discussed with the endusers. Also will be taking the opportunity to discuss the database draft with them.



### DATE HERE

Replace this test with what you are working on

Replace this text with brief notes describing what you worked on, any decisions you made, any changes to designs, etc. Add screenshots / links to other media to illustrate your notes where necessary.

> Replace this text with any user feedback / comments

Replace this text with notes describing how you acted upon the user feedback: made changes to design, etc.

### DATE HERE

Replace this test with what you are working on

Replace this text with brief notes describing what you worked on, any decisions you made, any changes to designs, etc. Add screenshots / links to other media to illustrate your notes where necessary.

> Replace this text with any user feedback / comments

Replace this text with notes describing how you acted upon the user feedback: made changes to design, etc.

### DATE HERE

Replace this test with what you are working on

Replace this text with brief notes describing what you worked on, any decisions you made, any changes to designs, etc. Add screenshots / links to other media to illustrate your notes where necessary.

> Replace this text with any user feedback / comments

Replace this text with notes describing how you acted upon the user feedback: made changes to design, etc.

### DATE HERE

Replace this test with what you are working on

Replace this text with brief notes describing what you worked on, any decisions you made, any changes to designs, etc. Add screenshots / links to other media to illustrate your notes where necessary.

> Replace this text with any user feedback / comments

Replace this text with notes describing how you acted upon the user feedback: made changes to design, etc.
