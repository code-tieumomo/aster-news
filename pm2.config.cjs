module.exports = {
    apps: [
        {
            name: "queue",
            script: "artisan",
            exec_mode: "fork",
            interpreter: "php",
            instances: 1,
            args: "queue:work --queue=crawl_url --sleep=3",
            error_file: './storage/logs/pm2/crawl_url.error.log',
            out_file: './storage/logs/pm2/crawl_url.out.log',
            pid_file: './storage/logs/pm2/crawl_url.pid.log',
        },
        {
            name: "process",
            script: "artisan",
            exec_mode: "fork",
            interpreter: "php",
            instances: 5,
            args: "queue:work --queue=process_post --sleep=3",
            error_file: './storage/logs/pm2/process_post.error.log',
            out_file: './storage/logs/pm2/process_post.out.log',
            pid_file: './storage/logs/pm2/process_post.pid.log',
        },
    ]
}
