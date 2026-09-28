# LA4 - Detail Pages, Route Parameters and Order

Name: Rostom P. Vigil
Course: ITRACKB4 - Web Systems and Technologies: Web Programming 2

## Q1. In what order did I place my featured route and my detail route, and what would happen if I swapped them?

I placed the featured route above the detail route. If I swapped them, the detail route could treat “featured” as an ID, and the page would show a 404 instead of the featured product.

## Q2. What happens when someone visits an id that does not exist, and what did I write to make that happen?

The visitor sees a 404 page when they enter an ID that does not match a product. In show(), I check whether the product exists with isset(), and use abort(404) if it does not.

## Q3. Why do my links use route names instead of typed URLs? What is one thing that would break if they did not?

Route names let my links keep working if I change a route’s URL. If I typed /products directly into the “Back to the product list” link, it would lead to a 404 after changing that route to /library.