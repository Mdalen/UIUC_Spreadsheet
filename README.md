# UIUC_Spreadsheet
This was a project I made for the UIUC Design group over the course of a few days to solve a problem we had
The problem was that we used a very old and hard to read Excel document
this was whipped up as a was to store our jobs in a small php page linked to a database using bootstrap to make it look presentable fast

Everything is included in this project here, including all Javascript and CSS files 
to use it, you will need to link a database in the correct file at /
The database will need to be as follows:
2 Tables
  designers
    designer_id (int)
    first_name (string)
    last_name (string)
  
  jobs
    job_id (int)
    designer_id (int)
    description (string)
    start_date (date)
    end_date (date)
    bill_date (date)
    primary_contact (string)
    percent_done (int)
    work_status (string)
    
it will then load from the database and read in the workers and jobs you have added and populate the page accordingly
you will then be able to add, remove, or edit the entries
due to the small scale nature of this project, the page will reload with every change and it will not filter database entries

