# haarlem-festival-cms

## MVC(S) implementation
Partly based on: https://stackoverflow.com/a/5864000
### Relevant quotes
- The communication between the model layer and other parts of the MVC triad should happen only through Services. 
- Controller is not responsible for validating user's input, because that is part of business rules and controller is definitely not calling SQL queries [...]

## Responsibilites
### Model
- object that holds and transforms data as needed


### View
- responsible for presentational logic
- reacts to state of model, User->isLoggedIn() for example
- utilizes templates

### Controller
- Reacts to user requests (urls)
- Renders views with data from Models

### Service
- Communicates with Models

### uri scheme


            controller method parameter
                 |       |        |
                 v       v        v
    toplevel.nl/jazz/events/jazz-event-name


## Models

     Model:     db table
     User       cms_users
     Event      cms_event
     Festival   festival_info, event_categories

# Docker commands

- stop stack  
`docker-compose down`

- start stack  
`docker-compose up --build`

- run composer install in docker container:  
`docker run --rm --interactive --tty --volume ${PWD}:/app composer install --ignore-platform-reqs`

- initial database setup:  
`docker-compose exec mysql sh -c "mysql -uroot -prootpw haarlemdb < ./setup.sql"`



# Development Setup

Make sure to have git and docker installed.

- clone repo  
`git clone https://github.com/JurekInholland/haarlem-festival-cms.git && cd haarlem-festival-cms`

- Run the aforementioned docker commands.

- visit http://localhost:6789/

- Done!