NationBuilder Dev Certification Exercises
=========================================

First [install Composer](http://getcomposer.org) if necessary. Then run:

```bash
composer install
```

Now run PHP server with this command, replacing the environment variables with your nation/site's values:

```bash
NB_SLUG=$SLUG NB_API_KEY=$KEY NB_SITE_SLUG=$SITE_SLUG php -S localhost:8080 
```

The exercises can now be accessed here:

Events
------

### Create an event

```
http://localhost:8080/events/create-event.php
```

### Make a form that allows others to update that event

```
http://localhost:8080/events/update-event.php?id=123
```

Replace the `id` param with the ID of the event to edit.

People
------

### Create a person

```
http://localhost:8080/people/create-person.php
```

### Update the person

```
http://localhost:8080/people/update-person.php?id=123
```

Replace the `id` param with the ID of the person to edit.

### Delete the person

```
http://localhost:8080/people/delete-person.php?id=123
```

Replace the `id` param with the ID of the person to delete.
