### deploy with Docker
```
git clone https://github.com/MechanicSCB/tigratika_test <project-name>
```
```
cd <project-name>
```
```
composer update
```
```
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```
```
sail up -d
```
```
sail artisan key:generate
```
```
sail npm i
```
```
sail npm run build
```
```
sail artisan migrate:fresh --seed
```

- Visit `http://localhost`
