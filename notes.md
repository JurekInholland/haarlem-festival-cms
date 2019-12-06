# To discuss:

## routing/uri scheme
- proposal:
    https://festival-domain.nl/admin/create
    /admin/event/event-slug
    /haarlem-food/restaurants
    /haarlem-food/restaurant/restaurant-slug

- relationship between location and category?

## general project structure/ github
- can we partially use js? Sorting/Filtering

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


## links inspiration
https://getbootstrap.com/docs/4.3/examples/checkout/

## Models needed
CmsUser
DanceArtist
DanceVenue

FoodRestaurant
RestaurantMenu? what was feedback during design pres.

DanceEvent
FoodEvent
JazzEvent

ShoppingCart
CartItem

Festival? global info like start, end date
///////
abdul: shopping cart?
hamza: check, compare
stephen: explain database model, festival days, css grid
///////////////////
cache page settins ; file? redis?