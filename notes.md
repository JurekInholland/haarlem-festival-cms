# To discuss:

## routing/uri scheme
- proposal:
    https://festival-domain.nl/admin/create
    /admin/event/event-slug
    /haarlem-food/restaurants
    /haarlem-food/restaurant/restaurant-slug

## general project structure/ github
- mvc(a) structure?
- have to use their sql server?
- code quality (bracket style, newline count, static typing)
- autoload, namespaces
- css  (separate files, combine all, inline)
- abstraction of sql queries (pdo)

model: should event->getCategory be 4 or 'Haarlem Food'
should it hold date as string or DateTime obj?

## static festival information
- date range
- categories
store in db or config?
cache in session?


## database schema
- festival_events
- cms_users
- shopping cart
    - many-to-many relationship?