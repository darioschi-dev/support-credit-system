# Guida all'utilizzo del sistema HelpQuota

## 1. Introduzione

HelpQuota è un sistema di supporto basato su ticket, alimentato da un pacchetto ore prepagato acquistabile tramite PayPal. Lato utente e amministratore condividono lo stesso helpdesk (basato su FreeScout) con un backend Symfony per la gestione dei crediti e acquisti.

---

## 2. Accesso iniziale

### Admin
- Visita: [http://localhost:8080](http://localhost:8080)
- Credenziali: specificate in `docker-compose.yaml` (es: `admin@localhost` / `adminpass`)

Se la pagina `/install` non compare, l’utente verrà creato via comando:

```bash
docker exec -it freescout php /www/html/artisan freescout:create-user   --email=admin@localhost   --password=adminpass   --role=admin
```

---

## 3. Acquisto ore

1. Vai su [http://localhost:3000/buy](http://localhost:3000/buy)
2. Scegli un pacchetto
3. Effettua il pagamento via PayPal
4. Symfony aggiorna il credito associato all'email utente

---

## 4. Creazione e gestione ticket

### Utente
- Accede a `http://localhost:8080`
- Crea un ticket tramite l'interfaccia
- Visualizza lo storico delle risposte

### Admin
- Risponde ai ticket
- Vede il credito residuo utente (via integrazione con backend Symfony)

---

## 5. Personalizzazione

### Branding
- I file override sono in `custom/` e modificano logo, intestazione e testi
- Esempio: sostituire “FreeScout” con “HelpDesk Dario”

### Titolo pagina
Edita `custom/resources/views/layouts/app.blade.php`:
```blade
<title>HelpDesk Dario</title>
```

---

## 6. Manutenzione

### Resettare tutto
```bash
rm -rf ./data/freescout ./data/db
docker-compose down -v
docker-compose up -d --build
```

### Forzare rigenerazione chiave Laravel
```bash
docker exec -it freescout bash
php artisan key:generate
```

---

## 7. Debug

- `docker logs freescout`
- `docker exec -it freescout bash`
