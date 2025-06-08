# HelpQuota

Sistema di ticketing con pacchetti ore acquistabili via PayPal.

## Servizi inclusi

- FreeScout (Helpdesk)
- Symfony 6.4 LTS (backend gestione crediti)
- MariaDB (database condiviso)

## Avvio rapido

```bash
git clone <questa-repo>
cd helpquota
docker-compose up -d
```

- FreeScout → http://localhost:8080
- Symfony `/buy` → http://localhost:3000/buy

## Configurazione

Modifica `.env` in `payment-backend` per configurare PayPal e DB.
