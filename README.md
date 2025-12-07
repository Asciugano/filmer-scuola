# PHP + MYSQL con Docker

Questo progetto è un setup base per PHP + MySQL usando Docker.  
Se non hai Docker Desktop, puoi usare **Colima** su macOS.

---

## ⚡ Requisiti
- Docker
- Colima (solo se non usi Docker Desktop)

---

## 🚀 Avvio del progetto

Se usi **Colima**:

1. Avvia Colima (se non è già avviato):
   - Se non usi memoria esterna:
     ```bash
     colima start
   - Se no:
     ```bash
     colima start --mount /path/to/your/external_memory:/path/to/your/external_memory

2. Avvia il Container:
   ```bash
   docker compose up -d --build

3. Accedi al progetto:
   - **PHP**: 
      http://127.0.0.1:8080
   - **phpMyAdmin**:
      http://127.0.0.1:8081

## Per modificare il db
   - Devi Aver avviato Docker
1. Da **Docker**:
   ```bash
   docker exec -it mysql_db mysql -u root -p

2. Da **MySqlClient**:
   ```bash
   mysql -h 127.0.0.1 -P 3306 -u root -p

## Per modificare le credenziali
   #### modificare il file docker-compose.yml
   - modifica dopo ai due punti(:)

1. Per cambiare la root password:
   - MYSQL_ROOT_PASSWORD
   - MYSQL_ROOT_PASSWORD

2. Per modificare il nome del db:
   - MYSQL_DATABASE

3. Per modificare l'utente:
   - MYSQL_USER

4. Per modificare la password dell'utente:
   - MYSQL_PASSWORD

## Per arrestare
1. Container Docker:
   - per eliminare i dati nel db:
      ```bash
      docker compose down -v
   - per averceli al prossimo riavvio:
      ```bash
      docker compose down

2. Colima:
   ```bash
   colima stop
