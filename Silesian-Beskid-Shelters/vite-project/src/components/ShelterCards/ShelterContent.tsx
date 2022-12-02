import ShelterCard from "./ShelterCard";


const ShelterContent = () => {
    

    
    return(
        <div className="contentWrapper">
        <ShelterCard 
        image_url="src/assets/images/klimczok.png"
        shelter_name="Klimczok"
        text ="górskie schronisko turystyczne Polskiego Towarzystwa Turystyczno-Krajoznawczego w Beskidzie Śląskim, pomiędzy szczytem Magury i przełęczą Siodło, na wysokości 1052 m n.p.m."
        link = "./klimczok.html"
        />
        <ShelterCard 
        image_url="src/assets/images/stozek.jpg"
        shelter_name="Stożek"
        text ="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec neque nec tortor gravida consequat ut nec arcu. Nullam pulvinar pulvinar augue, nec consequat sem viverra sit amet. Suspendisse potenti."
        link = "./stozek.html"
        />
        <ShelterCard 
        image_url="src/assets/images/soszow.jpg"
        shelter_name="Soszów"
        text ="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec neque nec tortor gravida consequat ut nec arcu. Nullam pulvinar pulvinar augue, nec consequat sem viverra sit amet. Suspendisse potenti."
        link = "./soszow.html"
        />
        <ShelterCard 
        image_url="src/assets/images/przyslop.jpg"
        shelter_name="Przysłop pod Baranią Górą"
        text ="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec neque nec tortor gravida consequat ut nec arcu. Nullam pulvinar pulvinar augue, nec consequat sem viverra sit amet. Suspendisse potenti."
        link = "./przyslop.html"
        />
        <ShelterCard 
        image_url="src/assets/images/rownica.jpg"
        shelter_name="Równica"
        text ="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec neque nec tortor gravida consequat ut nec arcu. Nullam pulvinar pulvinar augue, nec consequat sem viverra sit amet. Suspendisse potenti."
        link = "./rownica.html"
        />
        <ShelterCard 
        image_url="src/assets/images/skrzyczne.jpg"
        shelter_name="Skrzyczne"
        text ="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec neque nec tortor gravida consequat ut nec arcu. Nullam pulvinar pulvinar augue, nec consequat sem viverra sit amet. Suspendisse potenti."
        link = "./skrzyczne.html"
        />
        <ShelterCard 
        image_url="src/assets/images/szyndzielnia.jpg"
        shelter_name="Szyndzielnia"
        text ="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec neque nec tortor gravida consequat ut nec arcu. Nullam pulvinar pulvinar augue, nec consequat sem viverra sit amet. Suspendisse potenti."
        link = "./szyndzielnia.html"
        />
        <ShelterCard 
        image_url="src/assets/images/blatnia.jpg"
        shelter_name="Schronisko PTTK na Błatniej"
        text ="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec neque nec tortor gravida consequat ut nec arcu. Nullam pulvinar pulvinar augue, nec consequat sem viverra sit amet. Suspendisse potenti."
        link = "./blatnia.html"
        />
        </div>
        
    )
}
export default ShelterContent