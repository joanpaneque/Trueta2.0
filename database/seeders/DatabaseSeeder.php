<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Surgery;
use App\Models\SurgeryType;
use App\Models\HealthFlag;
use App\Models\Antibiotic;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@trueta.cat',
            'is_admin' => true,
            'is_manager' => true,
            'registered' => true,
            'deactivated' => false,
            'request' => false
        ]);

        User::factory(20)->create();

        Surgery::create([
            'name' => 'CARDÍACA',
            'color' => '#FF0000' // Rojo
        ]);
        
        Surgery::create([
            'name' => 'UROLÒGICA',
            'color' => '#FFA500' // Naranja
        ]);
        
        Surgery::create([
            'name' => 'GINECOLOGICA',
            'color' => '#FFFF00' // Amarillo
        ]);
        
        Surgery::create([
            'name' => 'OFTALMOLOGICA',
            'color' => '#008000' // Verde
        ]);
        
        Surgery::create([
            'name' => 'PLÀSTICA I DERMATOLÒGICA',
            'color' => '#0000FF' // Azul
        ]);
        
        Surgery::create([
            'name' => 'MAMA',
            'color' => '#4B0082' // Violeta
        ]);
        
        Surgery::create([
            'name' => 'NEUROCIRURGIA',
            'color' => '#9400D3' // Púrpura
        ]);
        
        Surgery::create([
            'name' => 'MÀXILO-FACIAL',
            'color' => '#FF1493' // Rosa
        ]);
        
        Surgery::create([
            'name' => 'ORL',
            'color' => '#FF4500' // Naranja rojizo
        ]);
        
        Surgery::create([
            'name' => 'TORÀCICA',
            'color' => '#00FFFF' // Cian
        ]);
        
        Surgery::create([
            'name' => 'VASCULAR',
            'color' => '#008080' // Verde azulado
        ]);
        
        Surgery::create([
            'name' => 'ORTOPÈDICA I TRAUMATOLÒGICA',
            'color' => '#800080' // Morado
        ]);
        
        Surgery::create([
            'name' => 'GASTROINTESTINAL',
            'color' => '#FFD700' // Dorado
        ]);
        
        Surgery::create([
            'name' => 'ESOFÀGICA, GÀSTRICA, DUODENAL SENSE OBSTRUCCIÓ',
            'color' => '#00FF00' // Lima
        ]);
        
        Surgery::create([
            'name' => 'DUODENAL AMB OBSTRUCCIÓ',
            'color' => '#800000' // Borgoña
        ]);
        
        Surgery::create([
            'name' => 'HEPATO BILIAR PANCREATICA',
            'color' => '#800000' // Borgoña
        ]);
        
        Surgery::create([
            'name' => 'COLO RECTAL',
            'color' => '#808000' // Oliva
        ]);
        
        Surgery::create([
            'name' => 'PROCTOLÒGICA NO COMPLEXA',
            'color' => '#808000' // Oliva
        ]);
        
        Surgery::create([
            'name' => 'ENDOSCOPIES',
            'color' => '#008080' // Verde azulado
        ]);
        
        Surgery::create([
            'name' => 'RADIOLOGIA INTERVENCIONISTA',
            'color' => '#9400D3' // Púrpura
        ]);


        SurgeryType::create([
            'surgery_id' => 1,
            'name' => 'Recanvi valvular'
        ]);

        SurgeryType::create([
            'surgery_id' => 1,
            'name' => 'Bypass aortocoronari'
        ]);

        SurgeryType::create([
            'surgery_id' => 1,
            'name' => 'Implantació de dispositius cardíacs (marcapàs, DAI,...)'
        ]);

        SurgeryType::create([
            'surgery_id' => 1,
            'name' => 'ECMO'
        ]);

        SurgeryType::create([
            'surgery_id' => 1,
            'name' => 'TAVI (inserció transcatèter de vàlvula aòrtica)'
        ]);

        SurgeryType::create([
            'surgery_id' => 1,
            'name' => 'Tancament CIA i FOP'
        ]);

        SurgeryType::create([
            'surgery_id' => 2,
            'name' => 'RTU, cirurgia endoscòpica, cirurgia reconstructiva, uretral'
        ]);

        SurgeryType::create([
            'surgery_id' => 2,
            'name' => 'Cirurgies AMB entrada tracte intestinal'
        ]);

        
        SurgeryType::create([
            'surgery_id' => 2,
            'name' => 'Pròtesis de pene, testicle o esfínter urinari'
        ]);

        SurgeryType::create([
            'surgery_id' => 2,
            'name' => 'Biopsia pròstata transperineal'
        ]);

        SurgeryType::create([
            'surgery_id' => 2,
            'name' => 'Litotrícia extracorpòrea',
            'prophylaxis' => 0
        ]);

        SurgeryType::create([
            'surgery_id' => 2,
            'name' => 'Cirurgia endourològica ambulatòria',
            'prophylaxis' => 0
        ]);

        SurgeryType::create([
            'surgery_id' => 2,
            'name' => 'Cistoscòpia',
            'prophylaxis' => 0
        ]);

        SurgeryType::create([
            'surgery_id' => 2,
            'name' => 'Cirurgia nèta testicular',
            'prophylaxis' => 0
        ]);

        SurgeryType::create([
            'surgery_id' => 2,
            'name' => 'Fimosi',
            'prophylaxis' => 0
        ]);

        SurgeryType::create([
            'surgery_id' => 2,
            'name' => 'Cirurgia de penis sense implant',
            'prophylaxis' => 0
        ]);


        SurgeryType::create([
            'surgery_id' => 3,
            'name' => 'Cesària'
        ]);

        SurgeryType::create([
            'surgery_id' => 3,
            'name' => 'Cirurgia laparotòmica SENSE entrada a vagina i amb baix ris de lesió intestinal'
        ]);
        
        SurgeryType::create([
            'surgery_id' => 3,
            'name' => 'Cirurgia laparoscòpica (amb assistència robòtica o no) que inclou histerectomia amb baix risc de lesió intestinal'
        ]);

        SurgeryType::create([
            'surgery_id' => 3,
            'name' => 'Cirurgia vulvar'
        ]);

        SurgeryType::create([
            'surgery_id' => 3,
            'name' => 'Cirurgia sòl pelvià amb o sense col.locació de material protèsic'
        ]);

        SurgeryType::create([
            'surgery_id' => 3,
            'name' => 'Cirurgia de mama'
        ]);

        SurgeryType::create([
            'surgery_id' => 3,
            'name' => 'Cirurgia laparoscòpica o laparotòmica amb risc de resecció o lesió intestinal (neoplàsia ovari, endometriosi profunda)'
        ]);

        SurgeryType::create([
            'surgery_id' => 3,
            'name' => 'Citoreducció neoplàsica ovari d’alta complexitat'
        ]);

        SurgeryType::create([
            'surgery_id' => 3,
            'name' => 'Avortament induït quirúrgic 1o i 2o trimestre'
        ]);

        SurgeryType::create([
            'surgery_id' => 3,
            'name' => 'Legrat puerperal'
        ]);

        SurgeryType::create([
            'surgery_id' => 3,
            'name' => 'Reparació estrips vaginals III-IV (afectació ano-rectal)'
        ]);

        SurgeryType::create([
            'surgery_id' => 4,
            'name' => 'Cataractes, glaucoma, injert corneal'
        ]);

        SurgeryType::create([
            'surgery_id' => 4,
            'name' => 'Cirurgia lacrimal'
        ]);

        
        SurgeryType::create([
            'surgery_id' => 4,
            'name' => 'Traumatisme penetrant d’ull'
        ]);

        SurgeryType::create([
            'surgery_id' => 6,
            'name' => 'Mastectomia oncològica'
        ]);

        SurgeryType::create([
            'surgery_id' => 6,
            'name' => 'Implants/reducció mama (B-II), reconstrucció oncoplàstica'
        ]);

        SurgeryType::create([
            'surgery_id' => 7,
            'name' => 'Inserció de derivació ventriculo peritoneal, ventriculo auricular (DVPA) i drenatge ventricular extern'
        ]);

        SurgeryType::create([
            'surgery_id' => 7,
            'name' => 'Craniotomia electiva'
        ]);

        
        SurgeryType::create([
            'surgery_id' => 7,
            'name' => 'Procediments discals: hernia discal, laminectomia, fusió espinal, mielomeningocele'
        ]);

        SurgeryType::create([
            'surgery_id' => 7,
            'name' => 'Drenatge hematoma subdural'
        ]);

        SurgeryType::create([
            'surgery_id' => 7,
            'name' => 'Biòpsia estereotàxica'
        ]);

        SurgeryType::create([
            'surgery_id' => 7,
            'name' => 'Cirurgia transesfenoidal (a través senos paranasales o faringe)'
        ]);

        
        SurgeryType::create([
            'surgery_id' => 8,
            'name' => 'Procediments cutanis sense implicació de la cavitat oral'
        ]);

        SurgeryType::create([
            'surgery_id' => 8,
            'name' => 'Septoplastia'
        ]);

        SurgeryType::create([
            'surgery_id' => 8,
            'name' => 'Rinoplastia simple'
        ]);

        
        SurgeryType::create([
            'surgery_id' => 8,
            'name' => 'Linfadenectomia'
        ]);
                
        SurgeryType::create([
            'surgery_id' => 8,
            'name' => 'Fractures maxilofacials'
        ]);

        SurgeryType::create([
            'surgery_id' => 8,
            'name' => 'Procediments cutanis AMB implicació de la cavitat oral'
        ]);

        SurgeryType::create([
            'surgery_id' => 8,
            'name' => 'Rinoplàstia complexa (revisió, pròtesis)'
        ]);

        SurgeryType::create([
            'surgery_id' => 8,
            'name' => 'Procediments odontològics (implant oral, endodòncia)'
        ]);

        SurgeryType::create([
            'surgery_id' => 8,
            'name' => 'Implantació d’injert ossi a través cavitat oral'
        ]);

        SurgeryType::create([
            'surgery_id' => 8,
            'name' => 'Cirurgia reconstructora'
        ]);

        SurgeryType::create([
            'surgery_id' => 9,
            'name' => 'Linfadenectomia extensa'
        ]);

        
        SurgeryType::create([
            'surgery_id' => 9,
            'name' => 'Cirurgia cervical amb ressecció multivisceral'
        ]);

        SurgeryType::create([
            'surgery_id' => 9,
            'name' => 'Implant coclear'
        ]);

        SurgeryType::create([
            'surgery_id' => 9,
            'name' => 'Traqueotomia'
        ]);

        SurgeryType::create([
            'surgery_id' => 9,
            'name' => 'Amigdalectomia'
        ]);

        SurgeryType::create([
            'surgery_id' => 9,
            'name' => 'Adenoidectomia'
        ]);

        SurgeryType::create([
            'surgery_id' => 9,
            'name' => 'Laringectomia'
        ]);

        SurgeryType::create([
            'surgery_id' => 9,
            'name' => 'Cirurgia de sinus o incisió de mucosa faringe- laringea'
        ]);

        SurgeryType::create([
            'surgery_id' => 9,
            'name' => 'Mastoïdectomia'
        ]);

        SurgeryType::create([
            'surgery_id' => 9,
            'name' => 'Cirurgia de cap i coll'
        ]);

        SurgeryType::create([
            'surgery_id' => 9,
            'name' => 'Cirurgia neta contaminada i contaminada d’oïda mitja i sins'
        ]);

        
        SurgeryType::create([
            'surgery_id' => 10,
            'name' => 'Lobectomia / Pneumonectomia / Resecció pulmonar'
        ]);

        SurgeryType::create([
            'surgery_id' => 10,
            'name' => 'Toracotomia'
        ]);

        SurgeryType::create([
            'surgery_id' => 10,
            'name' => 'Pleuroscòpia, toracoscòpia, videotoracoscòpia'
        ]);

        
        SurgeryType::create([
            'surgery_id' => 10,
            'name' => 'Decorticació pleural, pleurectomia'
        ]);
        
        SurgeryType::create([
            'surgery_id' => 10,
            'name' => 'Traumatisme toràcic penetrant'
        ]);

        SurgeryType::create([
            'surgery_id' => 11,
            'name' => 'Endarterectomia carotídia'
        ]);

        SurgeryType::create([
            'surgery_id' => 11,
            'name' => 'Cirurgia arterial (Ao abdominal, protètica, membres inferiors o que inclogui incisió inguinal)'
        ]);

        SurgeryType::create([
            'surgery_id' => 11,
            'name' => 'Amputació membre inferior per isquèmia'
        ]);

        SurgeryType::create([
            'surgery_id' => 11,
            'name' => 'Cirurgia vascular perifèrica percutània o oberta'
        ]);

        SurgeryType::create([
            'surgery_id' => 12,
            'name' => 'Implantació de material protètic (durada 24h)'
        ]);

        SurgeryType::create([
            'surgery_id' => 12,
            'name' => 'Artroplàstia genoll, maluc/ primaries i de revisió'
        ]);

        SurgeryType::create([
            'surgery_id' => 12,
            'name' => 'Reducció de fractura tancada amb material osteosíntesi'
        ]);

        SurgeryType::create([
            'surgery_id' => 12,
            'name' => 'Fractura oberta Gustilo I, II (durada 24 h)'
        ]);

        SurgeryType::create([
            'surgery_id' => 12,
            'name' => 'Laminectomia, fusió vertebral, discectomia amb/sense instrumentació'
        ]);

        
        SurgeryType::create([
            'surgery_id' => 12,
            'name' => 'Hernia discal'
        ]);

        SurgeryType::create([
            'surgery_id' => 12,
            'name' => 'Fractura oberta Gustilo III'
        ]);

        SurgeryType::create([
            'surgery_id' => 13,
            'name' => 'Cirurgia endocrina cervical (tiroides / paratiroides)',
            'prophylaxis' => 0
        ]);

        
        SurgeryType::create([
            'surgery_id' => 13,
            'name' => 'Hernioplastia inguinal laparoscòpica',
            'prophylaxis' => 0
        ]);

        SurgeryType::create([
            'surgery_id' => 13,
            'name' => 'Herniorrafia i hernioplastia inguinal o abdominal oberta'
        ]);

        SurgeryType::create([
            'surgery_id' => 13,
            'name' => 'Cirurgia de Budell prim amb o sense obstrucció'
        ]);

        SurgeryType::create([
            'surgery_id' => 14,
            'name' => 'Esofaguectomia, gastrectomia'
        ]);

        
        SurgeryType::create([
            'surgery_id' => 14,
            'name' => 'Cirurgia de reflux GE, achalasia, vagotomia'
        ]);

        SurgeryType::create([
            'surgery_id' => 14,
            'name' => 'Esplenectomia'
        ]);

        
        SurgeryType::create([
            'surgery_id' => 14,
            'name' => 'Cirurgia bariàtrica'
        ]);

        SurgeryType::create([
            'surgery_id' => 15,
            'name' => 'Traumatisme penetrant abdomen'
        ]);

        
        SurgeryType::create([
            'surgery_id' => 15,
            'name' => 'Apendicectomia'
        ]);

                
        SurgeryType::create([
            'surgery_id' => 16,
            'name' => 'CIRURGIA HEPÀTICA LAPAROSCÒPICA'
        ]);

        SurgeryType::create([
            'surgery_id' => 16,
            'name' => 'COLECISTECTOMIA'
        ]);

        SurgeryType::create([
            'surgery_id' => 16,
            'name' => 'CIRURGIA PANCREÀTICA'
        ]);

        SurgeryType::create([
            'surgery_id' => 16,
            'name' => 'Quist hidatidic'
        ]);

        SurgeryType::create([
            'surgery_id' => 19,
            'name' => 'Col·locació PEG'
        ]);

        SurgeryType::create([
            'surgery_id' => 19,
            'name' => 'USE- PAAF lesió quística al costat del tracte GI (inclou mediastí)'
        ]);

        SurgeryType::create([
            'surgery_id' => 19,
            'name' => 'Drenatge transmural de col·lecció pancreàtica'
        ]);

        SurgeryType::create([
            'surgery_id' => 19,
            'name' => 'CPRE (colangiopancreatografia retrògrada endoscòpica) amb drenatge incomplet via biliar'
        ]);

        SurgeryType::create([
            'surgery_id' => 20,
            'name' => 'Biòpsia d’òrgan procediment net',
            'prophylaxis' => 0
        ]);

        SurgeryType::create([
            'surgery_id' => 20,
            'name' => 'Biopsia transrectal pròstata'
        ]);

        SurgeryType::create([
            'surgery_id' => 20,
            'name' => 'Nefrostomia percutània'
        ]);

        SurgeryType::create([
            'surgery_id' => 20,
            'name' => 'Pròtesis endo vascular recobertes (Dacron, PTFE)'
        ]);

        SurgeryType::create([
            'surgery_id' => 20,
            'name' => 'Inserció filtre VCI',
            'prophylaxis' => 0
        ]);

        
        SurgeryType::create([
            'surgery_id' => 20,
            'name' => 'Angiografia Angioplàstia Inserció stent coronari i altres territoris',
            'prophylaxis' => 0
        ]);

        SurgeryType::create([
            'surgery_id' => 20,
            'name' => 'Inserció catèter venós central no tunelitzat',
            'prophylaxis' => 0
        ]);

        SurgeryType::create([
            'surgery_id' => 20,
            'name' => 'Inserció port a cath o CVC tunelitzat'
        ]);

        SurgeryType::create([
            'surgery_id' => 20,
            'name' => 'Embolització aneurisme amb inserció de “coil”',
            'prophylaxis' => 0
        ]);

        SurgeryType::create([
            'surgery_id' => 20,
            'name' => 'Embolització per control sagnat (ex politraumàtic)',
            'prophylaxis' => 0
        ]);

        SurgeryType::create([
            'surgery_id' => 20,
            'name' => 'Embolització amb probable infart isquèmic extens (úter,melsa,..)'
        ]);

        SurgeryType::create([
            'surgery_id' => 20,
            'name' => 'Quimio embolització de fetge amb esfínter Oddi prèviament NO funcionant'
        ]);

        SurgeryType::create([
            'surgery_id' => 20,
            'name' => 'Quimio embolització de fetge amb esfínter Oddi prèviament funcionant'
        ]);

        SurgeryType::create([
            'surgery_id' => 20,
            'name' => 'Inserció gastrostomia alimentació endoscòpica'
        ]);

        SurgeryType::create([
            'surgery_id' => 20,
            'name' => 'Catèter diàlisi peritoneal'
        ]);

        SurgeryType::create([
            'surgery_id' => 20,
            'name' => 'CPRE amb drenatge incomplet via biliar'
        ]);

        SurgeryType::create([
            'surgery_id' => 20,
            'name' => 'Drenatge via biliar/colecistostomia'
        ]);

        SurgeryType::create([
            'surgery_id' => 20,
            'name' => 'Shunt transjugular portosistèmic (TIPS)'
        ]);        

        SurgeryType::create([
            'surgery_id' => 12,
            'name' => 'Artroscòpia',
            'prophylaxis' => 0
        ]);        

        SurgeryType::create([
            'surgery_id' => 12,
            'name' => 'Reducció de fractura tancada sense material osteosíntesi',
            'prophylaxis' => 0
        ]);        

        SurgeryType::create([
            'surgery_id' => 12,
            'name' => "Retirada d'implants ortopèdics utilitzats com tractament de fractures",
            'prophylaxis' => 0
        ]);        

        SurgeryType::create([
            'surgery_id' => 5,
            'name' => 'Plàstica i dermatologica'
        ]);

        SurgeryType::create([
            'surgery_id' => 17,
            'name' => 'Colo rectal'
        ]);

        SurgeryType::create([
            'surgery_id' => 18,
            'name' => 'Proctològica no complexa'
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g
            Si es compleix 1 d’aquests criteris, afegir {{7}} 3-5 mg/kg:
            Pacients ingressats a planta durant > 72h, ingrés UCI/UCO/trasllat altre hospital, CEC >
            120’, risc d’exposició a microbiota intestinal o amb factors de risc sobreafegits per infecció
            BGN e immune deprimits.
            - Si FG > 15: {{7}} 5 mg/kg en dosi única.
            - Si FG < 15: {{7}} 3 mg/Kg en dosi única.',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 1,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g
            Si es compleix 1 d’aquests criteris, afegir {{7}} 3-5 mg/kg:
            Pacients ingressats a planta durant > 72h, ingrés UCI/UCO/trasllat altre hospital, CEC >
            120’, risc d’exposició a microbiota intestinal o amb factors de risc sobreafegits per infecció
            BGN e immune deprimits.
            - Si FG > 15: {{7}} 5 mg/kg en dosi única.
            - Si FG < 15: {{7}} 3 mg/Kg en dosi única.',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 2,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g
            Si es compleix 1 d’aquests criteris, afegir {{7}} 3-5 mg/kg:
            Pacients ingressats a planta durant > 72h, ingrés UCI/UCO/trasllat altre hospital, CEC >
            120’, risc d’exposició a microbiota intestinal o amb factors de risc sobreafegits per infecció
            BGN e immune deprimits.
            - Si FG > 15: {{7}} 5 mg/kg en dosi única.
            - Si FG < 15: {{7}} 3 mg/Kg en dosi única.',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 3,
        ]);

        HealthFlag::create([
            'description' => '{{4}} 15 mg/kg
            En cas de FG < 60 ml/min: {{10}} 800 mg ev .',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 1,
        ]);

        HealthFlag::create([
            'description' => '{{4}} 15 mg/kg
            En cas de FG < 60 ml/min: {{10}} 800 mg ev .',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 2,
        ]);

        HealthFlag::create([
            'description' => '{{4}} 15 mg/kg
            En cas de FG < 60 ml/min: {{10}} 800 mg ev .',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 3,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g + {{4}} 15 mg/kg
            En cas de FG < 60 ml/min: {{10}} 800 mg ev.
            Al·lèrgia Penicil·lina: {{4}} 15 mg/kg.',
            'name' => 'Colonitzat per MARSA',
            'surgery_type_id' => 1,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g + {{4}} 15 mg/kg
            En cas de FG < 60 ml/min: {{10}} 800 mg ev.
            Al·lèrgia Penicil·lina: {{4}} 15 mg/kg.',
            'name' => 'Colonitzat per MARSA',
            'surgery_type_id' => 2,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g + {{4}} 15 mg/kg
            En cas de FG < 60 ml/min: {{10}} 800 mg ev.
            Al·lèrgia Penicil·lina: {{4}} 15 mg/kg.',
            'name' => 'Colonitzat per MARSA',
            'surgery_type_id' => 3,
        ]);

        HealthFlag::create([
            'description' => '{{10}} 800 mg ev previ implant i posteriorment seguir amb dues dosis de 400
            mg/12h ev (total 3 dosis en 24 hores).
            +
            {{11}} 2g previ implant i posteriorment seguir amb dues dosis de 2g/8h (total 3
            dosis en 24h)..',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 4,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g + {{4}} 15 mg/kg
            Si accés via femoral cal cobrir flora genitourinària i digestiva (Enteroccoc faecalis i
            Enterobacteries).
            Es pot prolongar la profilaxi fins 24h post procediment segons indicacions metge prescriptor
            (habitualment 2 dosis post procediment).',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 5,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g + {{4}} 15 mg/kg
            Si accés via femoral cal cobrir flora genitourinària i digestiva (Enteroccoc faecalis i
            Enterobacteries).
            Es pot prolongar la profilaxi fins 24h post procediment segons indicacions metge prescriptor
            (habitualment 2 dosis post procediment).',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 6,
        ]);

        HealthFlag::create([
            'description' => '{{4}} 15 mg/Kg + {{9}} 2g',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 5,
        ]);

        HealthFlag::create([
            'description' => '{{4}} 15 mg/Kg + {{9}} 2g',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 6,
        ]);

        HealthFlag::create([
            'description' => '{{2}} 1,5 g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 7,
        ]);

        HealthFlag::create([
            'description' => '{{7}} 3-5 mg/Kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 7,
        ]);

        HealthFlag::create([
            'description' => '{{2}} 1,5 g + {{8}} 1g ev',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 8,
        ]);

        HealthFlag::create([
            'description' => '{{7}} 3-5 mg/kg + {{8}} 1g',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 8,
        ]);

        HealthFlag::create([
            'description' => '{{7}} 3-5 mg/kg + {{4}} 15 mg/Kg',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 9,
        ]);

        HealthFlag::create([
            'description' => '{{12}} 3g vo , entre 1-3 h abans del procediment o {{2}} 1,5 g ev',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 10,
        ]);

        HealthFlag::create([
            'description' => '{{12}} 3g vo o {{7}} 3-5 mg/Kg ev',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 10,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g
            * En cas de cesària associada a febre intrapart, corioamnionitis o ruptura prematura de
            membranes, consultar els protocols específics de tractament.',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 17,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/Kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 17,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g
            * En cas de cesària associada a febre intrapart, corioamnionitis o ruptura prematura de
            membranes, consultar els protocols específics de tractament.',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 18,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/Kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 18,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g
            * En cas de cesària associada a febre intrapart, corioamnionitis o ruptura prematura de
            membranes, consultar els protocols específics de tractament.',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 19,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/Kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 19,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g
            * En cas de cesària associada a febre intrapart, corioamnionitis o ruptura prematura de
            membranes, consultar els protocols específics de tractament.',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 20,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/Kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 20,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g
            * En cas de cesària associada a febre intrapart, corioamnionitis o ruptura prematura de
            membranes, consultar els protocols específics de tractament.',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 21,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/Kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 21,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g
            * En cas de cesària associada a febre intrapart, corioamnionitis o ruptura prematura de
            membranes, consultar els protocols específics de tractament.',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 22,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/Kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 22,
        ]);

        HealthFlag::create([
            'description' => '{{3}} 2g + {{8}} 1g
            . A la cirurgia programada es recomana la preparació mecànica del colon (Fosfoevac o
            Pleinvue) associada a antibiòtics via oral amb {{16}} 1g + {{8}} 500 mg, 3
            dosis preoperatòries 19, 18 i 9 h abans de l’inici de la cirurgia (és a dir, a les 13h, 14h i
            23h del dia anterior a la cirurgia).
            -Aquesta pauta es mantindrà durant 5 dies.',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 23,
        ]);

        HealthFlag::create([
            'description' => '{{8}} 1g + {{7}} 3-5 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 23,
        ]);

        HealthFlag::create([
            'description' => '{{3}} 2g + {{8}} 1g
            . A la cirurgia programada es recomana la preparació mecànica del colon (Fosfoevac o
            Pleinvue) associada a antibiòtics via oral amb {{16}} 1g + {{8}} 500 mg, 3
            dosis preoperatòries 19, 18 i 9 h abans de l’inici de la cirurgia (és a dir, a les 13h, 14h i
            23h del dia anterior a la cirurgia).
            -Aquesta pauta es mantindrà durant 5 dies.',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 24,
        ]);

        HealthFlag::create([
            'description' => '{{8}} 1g + {{7}} 3-5 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 24,
        ]);

        HealthFlag::create([
            'description' => '{{17}} 200 mg vo 2h abans del procediment o 200 mg ev (ha d’haver finalitzat
            dins els 60 min previs a la incisió), a passar en 2 hores.
            Si per situació clínica emergent, no és possible complir en temps, utilitzar la pauta
            d’al.lergics a Penicil.lina.',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 25,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 25,
        ]);

        HealthFlag::create([
            'description' => '{{17}} 200 mg vo 2h abans del procediment o 200 mg ev (ha d’haver finalitzat
            dins els 60 min previs a la incisió), a passar en 2 hores.
            Si per situació clínica emergent, no és possible complir en temps, utilitzar la pauta
            d’al.lergics a Penicil.lina.',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 26,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 26,
        ]);

        HealthFlag::create([
            'description' => '{{18}} 1g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 27,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 27,
        ]);

        HealthFlag::create([
            'description' => 'Es recomana l’administració intracameral de {{2}} 1 mg/0,1 ml',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 28,
        ]);

        HealthFlag::create([
            'description' => '{{13}} 160 mcg / 0,1 ml injecció intravítria',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 28,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 29,
        ]);

        HealthFlag::create([
            'description' => '{{4}} 15 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 29,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/Kg
            {{13}} 160 mcg / 0,1 ml administració intravítria',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 30,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 31,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900mg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 31,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g + {{4}} 15 mg/kg',
            'name' => 'Colonitzat per MARSA',
            'surgery_type_id' => 31,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 32,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900mg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 32,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g + {{4}} 15 mg/kg',
            'name' => 'Colonitzat per MARSA',
            'surgery_type_id' => 32,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 33,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 33,
        ]);

        HealthFlag::create([
            'description' => 'Afegir {{4}} 15mg/kg (màxim 2 grams) al tractament amb {{1}}.
            Si al·lèrgia a penicil·lina: {{4}}.',
            'name' => 'Colonitzat per MARSA',
            'surgery_type_id' => 33,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 34,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 34,
        ]);

        HealthFlag::create([
            'description' => 'Afegir {{4}} 15mg/kg (màxim 2 grams) al tractament amb {{1}}.
            Si al·lèrgia a penicil·lina: {{4}}.',
            'name' => 'Colonitzat per MARSA',
            'surgery_type_id' => 34,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 35,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 35,
        ]);

        HealthFlag::create([
            'description' => 'Afegir {{4}} 15mg/kg (màxim 2 grams) al tractament amb {{1}}.
            Si al·lèrgia a penicil·lina: {{4}}.',
            'name' => 'Colonitzat per MARSA',
            'surgery_type_id' => 35,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 36,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 36,
        ]);

        HealthFlag::create([
            'description' => 'Afegir {{4}} 15mg/kg (màxim 2 grams) al tractament amb {{1}}.
            Si al·lèrgia a penicil·lina: {{4}}.',
            'name' => 'Colonitzat per MARSA',
            'surgery_type_id' => 36,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 37,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 37,
        ]);

        HealthFlag::create([
            'description' => 'Afegir {{4}} 15mg/kg (màxim 2 grams) al tractament amb {{1}}.
            Si al·lèrgia a penicil·lina: {{4}}.',
            'name' => 'Colonitzat per MARSA',
            'surgery_type_id' => 37,
        ]);

        HealthFlag::create([
            'description' => '{{6}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 38,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 5 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 38,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 39,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 39,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 40,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 40,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 41,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 41,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 42,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 42,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 43,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 43,
        ]);

        HealthFlag::create([
            'description' => '{{6}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 44,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900mg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 44,
        ]);

        HealthFlag::create([
            'description' => '{{6}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 45,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900mg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 45,
        ]);

        HealthFlag::create([
            'description' => '{{6}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 46,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900mg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 46,
        ]);

        HealthFlag::create([
            'description' => '{{6}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 47,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900mg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 47,
        ]);

        HealthFlag::create([
            'description' => '{{6}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 48,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900mg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 48,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 49,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900mg
            Es recomana l’aplicació tòpica d’antibiòtic després de timpanoplàstia.',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 49,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 50,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900mg
            Es recomana l’aplicació tòpica d’antibiòtic després de timpanoplàstia.',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 50,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 51,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900mg
            Es recomana l’aplicació tòpica d’antibiòtic després de timpanoplàstia.',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 51,
        ]);

        HealthFlag::create([
            'description' => '{{6}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 52,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 52,
        ]);

        HealthFlag::create([
            'description' => '{{6}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 53,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 53,
        ]);

        HealthFlag::create([
            'description' => '{{6}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 54,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 54,
        ]);

        HealthFlag::create([
            'description' => '{{6}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 55,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 55,
        ]);

        HealthFlag::create([
            'description' => '{{6}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 56,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 56,
        ]);

        HealthFlag::create([
            'description' => '{{6}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 57,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 57,
        ]);

        HealthFlag::create([
            'description' => '{{6}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 58,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 58,
        ]);

                HealthFlag::create([
            'description' => '{{6}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 59,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 59,
        ]);

        HealthFlag::create([
            'description' => '{{6}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 60,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 60,
        ]);

        HealthFlag::create([
            'description' => '{{6}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 61,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 61,
        ]);

        HealthFlag::create([
            'description' => '{{6}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 62,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 62,
        ]);

        HealthFlag::create([
            'description' => '{{6}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 63,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 63,
        ]);

        HealthFlag::create([
            'description' => '{{6}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 64,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 64,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g
             Si hi ha implantació de material protètic, prolongar la profilaxi fins 24 h post
            intervenció.',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 65,
        ]);

        HealthFlag::create([
            'description' => '{{4}} 15 mg/kg
             S’aconsella afegir {{7}} si existeix risc d’exposició a microbiota intestinal.',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 65,
        ]);

        HealthFlag::create([
            'description' => 'Si procediment amb col·locació de material protètic:
            {{1}} 2g + {{4}} 15 mg/Kg
            Si Al·lèrgia a Peni: {{4}}
             S’aconsella afegir {{7}} si existeix risc d’exposició a microbiota intestinal.',
            'name' => 'Colonitzat per MARSA',
            'surgery_type_id' => 65,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g
             Si hi ha implantació de material protètic, prolongar la profilaxi fins 24 h post
            intervenció.',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 66,
        ]);

        HealthFlag::create([
            'description' => '{{4}} 15 mg/kg
             S’aconsella afegir {{7}} si existeix risc d’exposició a microbiota intestinal.',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 66,
        ]);

        HealthFlag::create([
            'description' => 'Si procediment amb col·locació de material protètic:
            {{1}} 2g + {{4}} 15 mg/Kg
            Si Al·lèrgia a Peni: {{4}}
             S’aconsella afegir {{7}} si existeix risc d’exposició a microbiota intestinal.',
            'name' => 'Colonitzat per MARSA',
            'surgery_type_id' => 66,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g
             Si hi ha implantació de material protètic, prolongar la profilaxi fins 24 h post
            intervenció.',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 67,
        ]);

        HealthFlag::create([
            'description' => '{{4}} 15 mg/kg
             S’aconsella afegir {{7}} si existeix risc d’exposició a microbiota intestinal.',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 67,
        ]);

        HealthFlag::create([
            'description' => 'Si procediment amb col·locació de material protètic:
            {{1}} 2g + {{4}} 15 mg/Kg
            Si Al·lèrgia a Peni: {{4}}
             S’aconsella afegir {{7}} si existeix risc d’exposició a microbiota intestinal.',
            'name' => 'Colonitzat per MARSA',
            'surgery_type_id' => 67,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g
             Si hi ha implantació de material protètic, prolongar la profilaxi fins 24 h post
            intervenció.',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 68,
        ]);

        HealthFlag::create([
            'description' => '{{4}} 15 mg/kg
             S’aconsella afegir {{7}} si existeix risc d’exposició a microbiota intestinal.',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 68,
        ]);

        HealthFlag::create([
            'description' => 'Si procediment amb col·locació de material protètic:
            {{1}} 2g + {{4}} 15 mg/Kg
            Si Al·lèrgia a Peni: {{4}}
             S’aconsella afegir {{7}} si existeix risc d’exposició a microbiota intestinal.',
            'name' => 'Colonitzat per MARSA',
            'surgery_type_id' => 68,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 69,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900mg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 69,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g + {{4}} 15 mg/kg
            Al·lèrgia a Penicil·lina: {{4}} 15 mg/kg',
            'name' => 'Colonitzat per MARSA',
            'surgery_type_id' => 69,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 70,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900mg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 70,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g + {{4}} 15 mg/kg
            Al·lèrgia a Penicil·lina: {{4}} 15 mg/kg',
            'name' => 'Colonitzat per MARSA',
            'surgery_type_id' => 70,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 71,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900mg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 71,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g + {{4}} 15 mg/kg
            Al·lèrgia a Penicil·lina: {{4}} 15 mg/kg',
            'name' => 'Colonitzat per MARSA',
            'surgery_type_id' => 71,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 72,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900mg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 72,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g + {{4}} 15 mg/kg
            Al·lèrgia a Penicil·lina: {{4}} 15 mg/kg',
            'name' => 'Colonitzat per MARSA',
            'surgery_type_id' => 72,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 73,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900mg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 73,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g + {{4}} 15 mg/kg
            Al·lèrgia a Penicil·lina: {{4}} 15 mg/kg',
            'name' => 'Colonitzat per MARSA',
            'surgery_type_id' => 73,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 74,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900mg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 74,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g + {{4}} 15 mg/kg
            Al·lèrgia a Penicil·lina: {{4}} 15 mg/kg',
            'name' => 'Colonitzat per MARSA',
            'surgery_type_id' => 74,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g + {{7}} 3-5 mg/Kg',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 75,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/Kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 75,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 78,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 78,
        ]);

        HealthFlag::create([
            'description' => 'Afegir {{4}}. En cas que s’utilitzi {{5}}, no cal afegir {{4}}.',
            'name' => 'Colonitzat per MARSA',
            'surgery_type_id' => 78,
        ]);

        HealthFlag::create([
            'description' => 'Sense obstrucció: {{1}} 2g
            Amb obstrucció: {{6}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 79,
        ]);

        HealthFlag::create([
            'description' => 'Sense obstrucció.: {{5}} 900 mg + {{7}} *
            Si FG < 20: {{7}} 2 mg/Kg
            Amb obstrucció: {{7}} + {{8}} 1g',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 79,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 80,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 80,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 81,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 81,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 82,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 82,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 83,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg + {{7}} 3-5 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 83,
        ]);

        HealthFlag::create([
            'description' => '{{6}} 2g 
            En cas de lesió víscera buida, es pot prolongar profilaxi 24h.',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 84,
        ]);

        HealthFlag::create([
            'description' => '{{8}} 1g + {{7}} 3-5 mg/Kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 84,
        ]);

        HealthFlag::create([
            'description' => '{{6}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 85,
        ]);

        HealthFlag::create([
            'description' => '{{8}} 1g + {{7}} 3-5 mg/Kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 85,
        ]);
        
        HealthFlag::create([
            'description' => 'Previ a la cirurgia cal tractament amb {{14}} 400 mg/12h oral +/- {{15}} 50
            mg/Kg/dia oral des de 2-4 setm abans del procediment i fins 1-3 mesos després.
            {{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 89,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 90,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 + {{7}} 3-5 mg/kg
            A part de la profilaxi, es recomana una bona antisèpsia del lloc d’implantació.',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 90,
        ]);

        HealthFlag::create([
            'description' => '{{19}} 400 mg ev',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 91,
        ]);

        HealthFlag::create([
            'description' => '{{19}} 400 mg ev',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 92,
        ]);

        HealthFlag::create([
            'description' => '{{20}} 4g ev dins els 60 min previs al procediment',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 93,
        ]);

        HealthFlag::create([
            'description' => '{{4}} 15 mg/Kg + {{7}} 3-5 mg/Kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 93,
        ]);

        HealthFlag::create([
            'description' => 'SI<3 SEGMENTS: No precisa profilaxi
            SI>3 SEGMENTS: {{6}} (Si
            cultius previs de bilis, ajustar segons
            antibiograma)',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 86,
        ]);

        HealthFlag::create([
            'description' => 'SI<3 SEGMENTS: No precisa profilaxi
            SI>3SEGMENTS: {{4}} + {{7}}',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 86,
        ]);

        HealthFlag::create([
            'description' => 'Baix Risc: No precisa profilaxi
            Alt Risc o cirurgia oberta: {{1}}
            “Alt risc” (1 o més): pacient intervingut
            d’urgència, DM, ASA>3, inmunodepressió,
            embaràs, Edat>70a, episodi de còlic biliar
            30 dies abans de la IQ, colangitis,
            icterícia, coledocolitiasi, IQ prèvia biliar,
            colecistitis aguda en els últims 6 mesos,
            pancreatitis alitiàsica i pròtesis a via biliar i
            ATB en l’últim mes.',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 87,
        ]);

        HealthFlag::create([
            'description' => '{{4}} + {{7}}',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 87,
        ]);

        HealthFlag::create([
            'description' => 'No manipulació via biliar: {{6}}
            Manipulació via biliar:
            -Si cultius bilis previs ajustar segons
            antibiograma.
            -Si NO tenim informació prèvia:
            {{20}}',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 88,
        ]);

        HealthFlag::create([
            'description' => '{{4}} + {{7}}',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 88,
        ]);

        HealthFlag::create([
            'description' => '{{12}} 3g vo 1 - 3 h abans',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 95,
        ]);

        HealthFlag::create([
            'description' => '{{12}} 3 g',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 95,
        ]);

        HealthFlag::create([
            'description' => '{{12}} 3g vo
            la nit abans
            {{3}} 2 g ev
            30 min abans',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 96,
        ]);

        HealthFlag::create([
            'description' => '{{7}} 3-5 mg/Kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 96,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 97,
        ]);

        HealthFlag::create([
            'description' => '{{4}} 15 mg/kg ev o
            {{10}} 800 mg si FG< 60ml/dia',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 97,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 101,
        ]);

        HealthFlag::create([
            'description' => '{{4}} 15 mg/kg ev o
            {{10}} 800 mg si FG< 60ml/dia',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 101,
        ]);

        HealthFlag::create([
            'description' => '{{2}} 1,5g ev + {{8}} 1 g ev',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 104,
        ]);

        HealthFlag::create([
            'description' => '{{4}} 15 mg/kg ev o 
            {{10}} 800 mg sFG< 60ml/dia + 
            {{8}} 1g ev',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 104,
        ]);

        HealthFlag::create([
            'description' => '{{2}} 1,5g ev + {{8}} 1 g ev',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 105,
        ]);

        HealthFlag::create([
            'description' => '{{4}} 15 mg/kg ev o 
            {{10}} 800 mg sFG< 60ml/dia + 
            {{8}} 1g ev',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 105,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g + {{8}} 1g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 106,
        ]);

        HealthFlag::create([
            'description' => '{{4}} 15 mg/kg ev o 
            {{10}} 800 mg sFG< 60ml/dia + 
            {{8}} 1g ev',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 106,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 107,
        ]);

        HealthFlag::create([
            'description' => '{{4}} 15 mg/kg ev o
            {{10}} 800 mg si FG< 60ml/dia',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 107,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 108,
        ]);

        HealthFlag::create([
            'description' => '{{4}} 15 mg/kg ev o
            {{10}} 800 mg si FG< 60ml/dia',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 108,
        ]);

        HealthFlag::create([
            'description' => '{{20}} 4g ev',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 109,
        ]);

        HealthFlag::create([
            'description' => '{{4}} 15 mg/Kg + {{7}} 3-5 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 109,
        ]);

        HealthFlag::create([
            'description' => '{{20}} 4g ev',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 110,
        ]);

        HealthFlag::create([
            'description' => '{{4}} 15 mg/Kg + {{7}} 3-5 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 110,
        ]);

        HealthFlag::create([
            'description' => '{{2}} 1,5 g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 111,
        ]);

        HealthFlag::create([
            'description' => '{{4}} 15 mg/kg ev
            {{10}} 800 mg sFG< 60ml/dia + {{9}} 2g',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 111,
        ]);

        HealthFlag::create([
            'description' => '{{1}} 2g
            (*) Factors de risc: duració cirurgia > 2 h, implant protètic, > 65 anys, obesitat, comorbilitats,
            transfusió, infecció activa a distància, la ILQ implicaria gravetat.',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 115,
        ]);

        HealthFlag::create([
            'description' => '{{5}} 900 mg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 115,
        ]);

        HealthFlag::create([
            'description' => '{{3}} 2g + {{8}} 1g.
            A la cirurgia colorectal programada es recomana la preparació mecànica del colon
            (Fosfoevac o Pleinvue) associada a antibiòtics via oral amb Neomicina 1g + {{8}}
            500 mg, 3 dosis preoperatòries 19, 18 i 9 h abans de l’inici de la cirurgia (és a dir, a les 13h,
            14h i 23h del dia anterior a la cirurgia).',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 116,
        ]);

        HealthFlag::create([
            'description' => '{{8}} 1g + {{7}} 3-5 mg/kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 116,
        ]);

        HealthFlag::create([
            'description' => '{{6}} 2g',
            'name' => 'Profilaxi quirúrgica d’elecció',
            'surgery_type_id' => 117,
        ]);

        HealthFlag::create([
            'description' => '{{8}} 1g + {{7}} 3-5 mg/Kg',
            'name' => 'Al·lèrgia a Penicil·lina',
            'surgery_type_id' => 117,
        ]);

        // 1
        Antibiotic::create([
            'name' => 'CEFAZOLINA',
            'description' => '- Dosi: 2 g ev .
            - Si el pacient pesa >120 kg administrar 3 grams IV.
            - Temps infusió: 30 min. Si no es disposa d’aquest temps es pot infondre en bolus 3-
            5 min.
            - L’antibiòtic ha d’haver finalitzat dins els 60 min previs a la incisió de la pell.
            - Donar segona dosi d’1g, si:
                La cirurgia dura ≥ 3 hores.
                Hi ha pèrdua de ≥ 1500mL de sang.
                En pacients amb FG 10- 30 ml/min, valorar redosificació. Si FG <10 no cal
                redosificar.'
        ]);

        // 2
        Antibiotic::create([
            'name' => 'CEFUROXIMA',
            'description' => '- Dosi: 1,5 g.
            - Temps infusió: 30 min. Si no es disposa d’aquest temps, es pot infondre en bolus
            3-5 min .
            - L’antibiòtic ha d’haver finalitzat dins els 60 min previs a la incisió de la pell.
            - Donar segona dosi d’1g, si:
                La cirurgia dura ≥ 3 hores.
                Hi ha pèrdua de ≥ 1500mL de sang.
                En pacients amb FG 10- 30 ml, valorar redosificació. Si FG <10 no cal
                redosificar.'
        ]);

        // 3
        Antibiotic::create([
            'name' => 'CEFTRIAXONA',
            'description' => '- Dosi: 2g ev.
            - Temps infusió: 30 min. Si no es disposa d’aquest temps, es pot infondre en bolus
            3-5 min.
            - L’antibiòtic ha d’haver finalitzat dins els 60 min previs a la incisió de la pell.
            - No cal re dosificar si la cirurgia es perllonga, només si ha pèrdua de ≥ 1500mL de
            sang.'
        ]);

        // 4
        Antibiotic::create([
            'name' => 'VANCOMICINA',
            'description' => '- Dosi: 15-20 mg/Kg (màx 2g) .
            - Taula segons pes:
                 < 50 kg: 750 mg
                 50-70 Kg: 1000 mg.
                 70-85 Kg: 1250 mg.
                 85-100 Kg: 1500 mg.
                 >100 kg: 1750 mg.
                 >120 kg: 2000 mg.
            - Temps infusió: ≤ 1g: 60 min.
            > 1g: 120 min.
            - La infusió ha d’haver finalitzat dins els 60 minuts previs a la incisió de la pell, per lo
            que serà necessari iniciar-la almenys 2 hores abans de la incisió de la pell.
            - No cal re dosificació intra operatòria.'
        ]);

        // 5
        Antibiotic::create([
            'name' => 'CLINDAMICINA',
            'description' => '- Dosi: 900 mg .
            - Temps infusió: 30 min.
            - L’antibiòtic ha d’haver finalitzat dins els 60 min previs a la incisió de la pell.
            - Donar segona dosi si:
                La cirurgia dura ≥ 6 hores.
                Hi ha pèrdua de ≥ 1500mL de sang.
                En pacients amb FG 10- 30 ml, valorar redosificació. Si FG <10 no cal
                redosificar.'
        ]);

        // 6
        Antibiotic::create([
            'name' => 'AMOXICIL·LINA CLAVULÀNIC',
            'description' => '- Dosi: 2g.
            - Temps infusió: 3.0 min. Si es necessita es pot passar en bolus 5 min.
            - L’antibiòtic ha d’haver finalitzat dins els 60 min previs a la incisió de la pell.
            - Donar segona dosi de 1g+200 mg, si:
                La cirurgia dura ≥ 3hores.
                Hi ha pèrdua de ≥ 1500mL de sang.
                En pacients amb FG 10- 30 ml/min, valorar redosificació. Si FG <10 no cal
                redosificar.'
        ]);

        // 7
        Antibiotic::create([
            'name' => 'GENTAMICINA',
            'description' => '- Dosi: 3-5 mg /kg
            Si FG > 15: Gentamicina 5 mg/kg .
            Si FG < 15: Gentamicina 3 mg/Kg .
            - Temps infusió: 30- 60 min.
            - L’antibiòtic ha d’haver finalitzat dins els 60 min previs a la incisió de la pell.
            - Donar segona dosi si pèrdua de ≥ 1500mL de sang.
            - No cal re-dosificar si es perllonga la cirurgia.
            
            Pes ajustat= [(pes real - pes ideal) x 0,4 ] + pes ideal.

            Pes ideal(kg):

            Altura (cm) | HOMBRES | MUJERES
            --------------------------------
            140         |   39    |   34
            145         |   43    |   39
            150         |   48    |   43
            155         |   52    |   48
            160         |   57    |   52
            165         |   61    |   57
            170         |   66    |   62
            175         |   71    |   66
            180         |   75    |   71
            185         |   80    |   75
            190         |   84    |   80
            195         |   89    |   84


            Dosis(mg):

            Pes Ajustat (Kg) | 3 mg/kg | 5 mg/kg
            -------------------------------------
            <55               |  160 mg |  240 mg
            50-60             |  160 mg |  320 mg
            60-75             |  240 mg |  320 mg
            75-90             |  240 mg |  400 mg
            90-110            |  320 mg |  480 mg

            '
        ]);

        // 8
        Antibiotic::create([
            'name' => 'METRONIDAZOL',
            'description' => '- Dosi: 15 mg/Kg/dia.
            - Temps infusió: 30-60 min.
            - Donar segona dosi si pèrdua de ≥ 1500mL de sang.
            - No cal re-dosificar si es perllonga la cirurgia.'
        ]);

        // 9
        Antibiotic::create([
            'name' => 'AZTREONAM',
            'description' => '- Dosi: 2g.
            - Temps infusió: 30 min.
            - Donar segons dosi si:
                La cirurgia dura > 4 hores.
                Hi ha pèrdua ≥ 1500mL de sang.
                En pacients amb FG 10- 30 ml, valorar redosificació. Si FG <10 no cal
                redosificar.'
        ]);


        // 10
        Antibiotic::create([
            'name' => 'TEICOPLANINA',
            'description' => null
        ]);

        // 11
        Antibiotic::create([
            'name' => 'CEFTAZIDIMA',
            'description' => null
        ]);

        // 12
        Antibiotic::create([
            'name' => 'FOSFOMICINA TROMETAMOL',
            'description' => null
        ]);

        // 13
        Antibiotic::create([
            'name' => 'MOXIFLOXACINO',
            'description' => null
        ]);

        
        // 14
        Antibiotic::create([
            'name' => 'ALBENDAZOL',
            'description' => null
        ]);

        // 15
        Antibiotic::create([
            'name' => 'PRAZIQUANTEL',
            'description' => null
        ]);

        // 16
        Antibiotic::create([
            'name' => 'NEOMICINA',
            'description' => null
        ]);

        // 17
        Antibiotic::create([
            'name' => 'DOXICICLINA',
            'description' => null
        ]);

        // 18
        Antibiotic::create([
            'name' => 'CEFOXITINA',
            'description' => null
        ]);

        // 19
        Antibiotic::create([
            'name' => 'CIPROFLOXACI',
            'description' => null
        ]);

        // 20
        Antibiotic::create([
            'name' => 'PIPERACIL.LINA-TAZOBACTAM',
            'description' => null
        ]);
     
    }
}
