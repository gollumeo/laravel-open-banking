# Laravel Open Banking

Laravel Open Banking is an SDK designed to facilitate the integration of Open Banking services into Laravel. It aims to provide a smooth and extensible abstraction for retrieving and managing banking data from APIs such as Tink, Plaid, and TrueLayer.

## 📌 Features

✅ Configurable abstraction for retrieving and transforming accounts and transactions.<br>
✅ Advanced OAuth management with token persistence and automatic refresh.<br>
✅ Optimized requests through optional data caching.<br>
✅ Robust error handling with retry mechanisms, logs, and rate limiting.<br>
✅ Interoperability with multiple Open Banking services.<br>
✅ Extensibility and modularity for seamless integration with Laravel.

## 🛠 Installation

### 1. Install the package via Composer

```bash
composer require fintrack/laravel-open-banking
```

### 2. Publish the configuration

```bash
php artisan vendor:publish --tag=open-banking-config
```
This will create a config/open-banking.php file where you can configure your Open Banking provider.

### 3. Add environment variables

In your .env file:

```env
OPEN_BANKING_PROVIDER=tink
OPEN_BANKING_CLIENT_ID=your_client_id
OPEN_BANKING_CLIENT_SECRET=your_client_secret
OPEN_BANKING_REDIRECT_URI=https://yourapp.com/callback
```

## ⚙️ Usage

Connect to an Open Banking service

```php
use Fintrack\OpenBanking\OpenBanking;

$openBanking = new OpenBanking();
$response = $openBanking->connect();

Retrieve bank accounts

$accounts = $openBanking->getAccounts();

Retrieve transactions

$transactions = $openBanking->getTransactions(accountId: '12345');
```

## 📅 Roadmap (upcoming features)

🔹 Support for multiple providers (Tink, Plaid, TrueLayer)<br>
🔹 Enhanced webhook management<br>
🔹 Improved security and logging

## 🤝 Contributing

Contributions are welcome! To get started:
- Fork the repo 🍴
- Create a new branch feature/your-feature 🌱
- Commit your changes git commit -m "Add ..." 💡
- Open a PR 🚀

## 📜 License

This project is licensed under the **MIT** License. See \[REDACTED\] for more details.

💙 Developed with passion by Golluméo.

