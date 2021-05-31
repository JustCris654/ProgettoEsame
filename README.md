# ProgettoEsame
##Utenti:
- Dipendenti: 
  * Email: giorgiorossi@hardwareinyout.it
  * Password: jojo
- Utenti:
  * 1
    * Email: mbrusa@gmail.com
    * Password: ripa
  * 2
    * Email: tonimagi@gmail.com
    * Password: agi

###Evento SQL per gestire le garanzie
```sql
create definer = root@localhost event DisabilitaGaranzia on schedule
  every '1' DAY
    starts '2021-05-26 12:22:00'
  on completion preserve
  enable
  do
  begin
    update ordine
    set garanzia=0
    where datediff(now(), data) / 365 > 2;
  end;
```