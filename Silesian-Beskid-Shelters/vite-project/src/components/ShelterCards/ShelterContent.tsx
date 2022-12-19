import ShelterCard from "./ShelterCard";


const ShelterContent = () => {
    

    
    return(
        <div className="contentWrapper">
        <ShelterCard 
        image_url="assets/klimczok.png"
        shelter_name="Klimczok"
        text ="górskie schronisko turystyczne Polskiego Towarzystwa Turystyczno-Krajoznawczego w Beskidzie Śląskim, pomiędzy szczytem Magury i przełęczą Siodło, na wysokości 1052 m n.p.m."
        link = "/klimczok"
        />
        <ShelterCard 
        image_url="assets/stozek.jpg"
        shelter_name="Stożek"
        text ="Budynek schroniska znajduje się poniżej szczytu Wielkiego Stożka (978 m. npm.), tuż przy grzbiecie pasma Czantorii i Stożka, stanowiącego jednocześnie granicę Polsko - Czeską. "
        link = "/stozek"
        />
        <ShelterCard 
        image_url="assets/soszow.jpg"
        shelter_name="Soszów"
        text ="Schronisko na Soszowie to jedno z najstarszych schronisk w Beskidzie Śląskim, znajduje się na początku Głównego Szlaku Beskidzkiego, pomiędzy Czantorią i Stożkiem."
        link = "/soszow"
        />
        <ShelterCard 
        image_url="assets/przyslop.jpg"
        shelter_name="Przysłop"
        text ="Schronisko znajduje się na wysokości 900 m n.p.m. na szlaku wiodącym na Baranią górę. Współczesny budynek pochodzi z 1978 roku i w swojej bryle koresponduje z czasami, w których został zbudowany."
        link = "/przyslop"
        />
        <ShelterCard 
        image_url="assets/rownica.jpg"
        shelter_name="Równica"
        text ="Schronisko Równica to budynek usytuowany w Beskidzie Śląskim, w pobliżu szczytu Równicy, na terenie Tatrzańskiego Parku Narodowego. Wokół schroniska rozciągają się malownicze szlaki turystyczne, które pozwalają na podziwianie piękna Beskidu."
        link = "/rownica"
        />
        <ShelterCard 
        image_url="assets/skrzyczne.jpg"
        shelter_name="Skrzyczne"
        text ="Schronisko Skrzyczne to jedno z najstarszych schronisk w Beskidzie Śląskim, znajduje się na wysokości 1000 m n.p.m. Schronisko oferuje wiele atrakcji takich jak wyciągi narciarskie czy trasy rowerowe."
        link = "/skrzyczne"
        />
        <ShelterCard 
        image_url="assets/szyndzielnia.jpg"
        shelter_name="Szyndzielnia"
        text ="Schronisko na Szyndzielni położone na wysokości 1001m. n.p.m. zbudowane w 1897 roku jest najstarszym schroniskiem w Beskidach. Zbudowane jest z kamienia, architekturą nawiązuje do schronisk alpejskich, z charakterystyczną wieżyczką."
        link = "/szyndzielnia"
        />
        <ShelterCard 
        image_url="assets/blatnia.jpg"
        shelter_name="Schronisko PTTK na Błatniej"
        text ="Schronisko PTTK na Błatniej w Beskidzie Śląskim to popularne miejsce w pobliżu Bielska-Białej. Prowadzą tam liczne szlaki turystyczne: z Doliny Wapienicy, Brennej, Jaworza czy Klimczoka."
        link = "/blatnia"
        />
        </div>
        
    )
}
export default ShelterContent