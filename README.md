NationBuilder Dev Certification Exercises
=========================================

Run PHP server with this command, replacing the environment variables with your nation/site's values:

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