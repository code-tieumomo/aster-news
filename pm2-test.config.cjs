module.exports = {
    apps: [
        {
            name: "test",
            script: "artisan",
            exec_mode: "fork",
            interpreter: "php",
            instances: 1,
            args: "queue:work",
            error_file: './storage/logs/pm2/pm2-test.error.log',
            out_file: './storage/logs/pm2/pm2-test.out.log',
            pid_file: './storage/logs/pm2/pm2-test.pid.log',
            max_restarts: 3,
        },
    ]
}
