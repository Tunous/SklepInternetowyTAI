<?php

use App\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('alias');
            $table->string('short_description');
            $table->longText('description');
            $table->integer('cost')->unsigned();
            $table->timestamps();
        });

        $this->addProduct('Dobble',
            'dobble',
            'Znajdź jeden wspólny symbol, zanim zrobią to Twoi przeciwnicy!',
            '<p><strong>"Dobble"</strong>&nbsp;to 50 symboli na 55 kartach, po 8 symboli na karcie. Pomiędzy dwiema dowolnymi kartami jest tylko jeden wsp&oacute;lny symbol i to Ty musisz zobaczyć kt&oacute;ry.<br /><br /><strong>"Dobble"</strong>&nbsp;to seria szybkich mini-gier na refleks, w kt&oacute;rych wszyscy gracze biorą udział jednocześnie. Możesz rozgrywać je w określonej kolejności, losowo, albo grać ciągle w tę samą. Najważniejsze by wszyscy dobrze się bawili!</p>',
            5995);
        $this->addProduct('Carcassone',
            'carcassone',
            '"Carcassonne" jest wyśmienitą grą strategiczną łączącą pokolenia. Dziadkowie, rodzice, dzieci - wszyscy przy jednym stole!',
            '<p><strong><em>"Carcassonne"</em></strong><em>&nbsp;nie jest typową grą planszową. Należałoby ją zaliczyć raczej do gatunku gier kafelkowych. Gracze, bowiem po kolei dokładają kawałki (kafelki) terenu budując z nich miasta, klasztory, drogi i pola.</em><br /><br />Każdy z graczy po dołożeniu kafelka lądu może na nim umieścić jednego ze swoich siedmiu poddanych. To gdzie go umieści ma kluczowe znaczenie dla rozgrywki. Ot&oacute;ż umieszczając poddanego na fragmencie miasta czyni go rycerzem, drogi - złodziejem, pola - chłopem, a w klasztorze - mnichem. Oczywiście za każde zagranie jest przyznawana pewna ilość punkt&oacute;w. Gdy wszystkie kafelki zostaną dołożone gra dobiega końca, a punkty są podliczane. Ten kto zdobędzie ich najwięcej wygrywa.<br /><br />Kluczowe znaczenie dla rozgrywki ma decyzja gdzie umieścić swojego poddanego. Mamy ich tylko siedmiu i powracają do naszej puli tylko w&oacute;wczas jeżeli obiekt na kt&oacute;rym stoją jest w pełni ukończony. Nieukończone miasta, drogi, klasztory blokują nam poddanych do momentu zakończenia rozgrywki, uniemożliwiając zdobywanie punkt&oacute;w.<br /><br />Gra ma bardzo proste zasady, a jednocześnie jest niesamowicie grywalna. Jest to jedna z najlepszych wielopokoleniowych gier rodzinnych. Wyśmienicie sprawdza się czasie rodzinnych spotkań. Znakomita na prezent! Dobra w deszczowe dni na feriach i koloniach. Znakomicie integruje towarzystwo i "przełamuje pierwsze lody" przy zawieraniu nowych znajomości! Przy tym podoba się każdemu - bez względu na płeć, wiek i doświadczenie w grach towarzyskich!</p>',
            11590);
        $this->addProduct('Cluedo',
            'cluedo',
            'Jedna zbrodnia... sześciu podejrzanych. Odkryj kto zabił gospodarza!',
            '<p><em>Dr Black z rodziny Tudor&oacute;w,</em><br /><em>jest zaszczycony Państwa obecnością,</em><br /><em>na uroczystości 30-tych urodzin i ponownego otwarcia rezydencji Tudor&oacute;w.</em><br /><br /></p><p>Zaproszenia o treści zawartej powyżej rozesłane. Goście już przybyli. Gospodarz został zamordowany! Zamordowany z zimną krwią. Ktoś chce przejąć jego majątek...? Wuj ostrzegał, komu nie powinien ufać, ale Hrabia Hugh jest już martwy i leży w grobie! Sześć barwnych postaci jest podejrzanych.&nbsp;Wyeliminuj podejrzanych i rozwiąż zagadkę&nbsp;<strong>kto</strong>&nbsp;zabił,&nbsp;<strong>jakim</strong>&nbsp;narzędziem i&nbsp;<strong>gdzie</strong>!</p>',
            13760);
        $this->addProduct('Rummikub',
            'rummikub',
            'Prosta, wciągająca, inna w każdej kolejnej rozgrywce. Taka właśnie jest gra "Rummikub"!',
            '<p>Gra polega na wykładaniu na st&oacute;ł utworzonych przez gracza układ&oacute;w kostek. Mogą je stanowić albo serie, albo grupy. Seria składa się z co najmniej trzech kostek o kolejnych numerach w jednym kolorze, a grupa to trzy lub cztery kostki z tym samym numerem w r&oacute;żnych kolorach.<br /><br />Celem gry jest jak najszybsze wyłożenie na st&oacute;ł wszystkich kostek ze swojej tabliczki. Gracz, kt&oacute;ry dokona tego jako pierwszy &ndash; wygrywa. Inni gracze liczą punkty pozostałe im na tabliczkach i zapisują je ze znakiem ujemnym. Zwycięzca zapisuje ze znakiem dodatnim sumę punkt&oacute;w pozostałych graczy. Rozgrywka może się toczyć z limitem czasu lub bez.</p>',
            9990);
        $this->addProduct('Bingo (Loteria Lotto)',
            'bingo',
            'Popularna gra rodzinna, znana na całym świecie!',
            '<p>Bingo może pochodzić od gry zwanej Lotto, popularnej we Włoszech w roku 1530. Słowo Bingo pochodzi od zniekształcenia słowa Beano, nazwy gry popularnej w USA w latach 20. Natomiast Beano to pochodna angielskiego słowa "bean" (fasola), gdyż to właśnie ziarna fasoli były wykorzystywane do przykrywania wyczytanych cyfr.<br /><br />Każdy grający w Bingo dostaje kartę z kombinacją numer&oacute;w. W każdej turze osoba niegrająca,&nbsp;wyciąga z woreczka,&nbsp;znacznik z numerem oraz odczytuje ten numer dla wiadomości wszystkich graczy. Następnie wylosowany&nbsp;znacznik jest odkładany, tak aby nie mogła być wylosowany ponownie. Każdy z graczy szuka na swojej karcie wywołanego numeru, a jak znajdzie &ndash; zaznacza ten numer. Losowanie oraz ogłaszanie numer&oacute;w jest kontynuowane, do momentu kiedy kt&oacute;ryś z graczy nie uformuje ustalonego wzoru na swojej karcie, a następnie nie ogłosi tego poprzez głośne powiedzenie słowa Bingo!</p>',
            7900);
        $this->addProduct('Twister',
            'twister',
            'Bestsellerowa gra imprezowa! Gra, która zaplącze Cię w supełek!',
            '<p>Jak bardzo jesteś zakręcony? Prawa noga na czerwone! Brawo! Lewa ręka na zielone! Potrafisz? Miliony śmiesznych pozycji i tony śmiechu przy tym! Zakręć strzałką i sprawdź, jakie kroki musisz wykonać. Ostatni gracz, kt&oacute;ry zostanie na macie, wygrywa! Wielką zaletą&nbsp;<strong>"Twistera"</strong>&nbsp;jest możliwość rozgrywki drużynowej oraz dostosowywanie reguł do potrzeb. Rozkręć kolorowe pola z dwoma nowymi ruchami: w g&oacute;rę (podnieść ręce lub nogi do g&oacute;ry) i tw&oacute;j wyb&oacute;r (sam decyduj o następnym ruchu).</p>',
            11680);
        $this->addProduct('Ryzyko',
            'ryzyko',
            'Stwórz własną armię i poprowadź ją do zwycięstwa, w strategicznej grze wszechczasów!',
            '<p>W grze&nbsp;<strong>&rdquo;Ryzyko&rdquo;&nbsp;</strong>cel jest tylko jeden: podbić terytorium wroga, taktycznie planując posunięcia swojego wojska&nbsp;w bitwach. Zależnie od wyniku, jaki wskaże kostka do gry, będziesz m&oacute;gł atakować wrog&oacute;w bądź to oni będą atakować ciebie. Jeśli pokonasz wszystkie oddziały wroga, obecne na danym terytorium, podbiłeś obszar i jesteś o krok bliżej, od podboju całego świata.&nbsp;</p><p><strong><br />Zdrady... sojusze... niespodziewane ataki...<br />Na polu bitwy, wszystko jest dozwolone!<br /><br />Tylko ten, kto jest got&oacute;w podjąć największe ryzyko, może podbić świat!</strong></p>',
            21500);
        $this->addProduct('Wsiąść do pociągu: Europa',
            'wsiasc_do_pociagu_europa',
            'Polska edycja jednej z najlepszych gier rodzinnych! Wyrusz w podróż dookoła Europy!',
            '<p><em>Od urwistych wzg&oacute;rz Edynburga po rozświetlone słonecznym blaskiem doki Konstantynopola, od zakurzonych alei Pampeluny po smaganą wiatrem stację w Berlinie, "<strong>Wsiąść do pociągu: Europa"</strong>&nbsp;zabiera Cię na nową kolejową przygodę poprzez wielkie miasta Europy ubiegłego wieku. Czy chcesz zaryzykować podr&oacute;ż przez ciemne tunele Szwajcarii? Przygodę na pokładzie promu na Morzu Czarnym? Lub wznieść eleganckie stacje kolejowe w wielkich stolicach starych imperi&oacute;w? Tw&oacute;j następny krok może sprawić, że staniesz się największym magnatem kolejowym w Europie!</em><br />&nbsp;</p><div><strong>"Wsiąść do pociągu: Europa"</strong>&nbsp;jest godnym następcą swego poprzednika &ndash;&nbsp;<strong>"Ticket to Ride"</strong>.</div>',
            16996);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }

    private function addProduct($name, $alias, $short_description, $description, $cost)
    {
        $product = new Product([
            'name' => $name,
            'alias' => $alias,
            'short_description' => $short_description,
            'description' => $description,
            'cost' => $cost
        ]);
        $product->save();
    }
}
