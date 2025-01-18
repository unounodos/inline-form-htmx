# HTMX swap

Deze repo bevat een voorbeeld van hoe je HTMX kan gebruiken om 
een uit een full page response alleen een snippet te gebruiken om
een target te updaten.

Dit maakt gebruik van hx-select

De view is welcome.blade.php en de controller HelloController

Uit de response wordt alleen de html gepakt met id #parent-div en
ook weer op die plek geinjecteerd.

De timestamp verandert niet, hetgeen bewijst dat niet alles geswapt wordt
# inline-form-htmx
