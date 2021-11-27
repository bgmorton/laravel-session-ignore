# bgmorton/laravel-session-ignore

Prevents long-lived sessions being created for given user agents

## Installation Instructions

Add the following to your composer.json:

    {
        "repositories": [
            {
                "url": "https://github.com/bgmorton/laravel-session-ignore.git",
                "type": "git"
            }
        ]
    }

And then run the following to install:

    composer require bgmorton/laravel-session-ignore

Publish config:

    php artisan vendor:publish --provider="bgmorton\LaravelSessionIgnore\LaravelSessionIgnoreServiceProvider" --tag="config"
    
## Notes

- User agents are case sensitive and must match in their entirety
- Tested with postman

## Resources

https://laracasts.com/discuss/channels/servers/laravel-sessions-database-table-filling-up-with-user-agent-elb-healthchecker20
https://stackoverflow.com/questions/64170928/laravel-8-set-session-lifetime-in-middleware
https://laravelpackage.com
https://docs.cloudron.io/apps/lamp/