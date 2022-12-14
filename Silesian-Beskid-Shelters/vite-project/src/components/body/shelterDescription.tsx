import { Component } from 'react';
import { render } from 'react-dom';
import Navbar from '../Nav/navbar'
import { useEffect } from 'react';
import { useState } from 'react';
import { motion } from "framer-motion"



const ShelterDescription = (prop : {shelter_image : string}) => {


    const shelter_image = prop.shelter_image;
    const backgroundImage = {
        backgroundImage: `url(${shelter_image})`,
    }



    return(
        <div className="sWrapper">
                <div className="headerShelter"><h1>O Schronisku</h1></div>
                <div className="aboutShelter">
                    <div className='shelterContentWrap'>
                    <motion.div initial={{ opacity: 0 }}
                        whileInView={{ opacity: 1 }}
                        transition={{ anticipation: 0.5, duration: 0.5 }}
                        viewport={{once:true}}
                        className="image" style={backgroundImage}  />
                    <motion.div
                        initial={{ opacity: 0 }}
                        whileInView={{ opacity: 1 }}
                        transition={{ anticipation: 0.5, duration: 0.5 }}
                        viewport={{once:true}} 
                        className="text"><h4>Schronisko</h4> Skąd wzięła się nazwa Klimczok?
                            Klimczok przed latami zwany był również jako Klimczak, zatem dzisiejsza nazwa niespecjalnie różni się od poprzedniczki. A wzięła się stąd, że nzachodnich   zboczach szczytu, znajduje się kilka niewielkich jaskiń. Według podań ludowych, w jednej z nich skrywał się półlegendarny zbójnik Klimczok. to właśnie od     nazwiska słynnego zbójnika, który działał pod koniec XVII wieku na terenie dzisiejszego żywiecko-śląskiego pogranicza, w epoce romantyzmuprzylgnęła obecna nazwa    tego szczytu. Co prawda, jeszcze na początku XIX w. góra nazywana była Goryczną Skałką lub zwyczajnie Skałką.
                    </motion.div>
                    </div>
                </div>
                <div className="aboutShelter">
                    <div className="shelterContentWrap">
                    <motion.div
                        initial={{ opacity: 0 }}
                        whileInView={{ opacity: 1 }}
                        transition={{ anticipation: 0.5, duration: 0.5 }}
                        viewport={{once:true}}
                         className="text"><h4>Schronisko</h4> Skąd wzięła się nazwa Klimczok?
                            Klimczok przed latami zwany był również jako Klimczak, zatem dzisiejsza nazwa niespecjalnie różni się od poprzedniczki. A wzięła się stąd, że nzachodnich   zboczach szczytu, znajduje się kilka niewielkich jaskiń. Według podań ludowych, w jednej z nich skrywał się półlegendarny zbójnik Klimczok. to właśnie od     nazwiska słynnego zbójnika, który działał pod koniec XVII wieku na terenie dzisiejszego żywiecko-śląskiego pogranicza, w epoce romantyzmuprzylgnęła obecna nazwa    tego szczytu. Co prawda, jeszcze na początku XIX w. góra nazywana była Goryczną Skałką lub zwyczajnie Skałką.
                    </motion.div>
                    <motion.div initial={{ opacity: 0 }}
                        whileInView={{ opacity: 1 }}
                        transition={{ anticipation: 0.5, duration: 0.5 }}
                        viewport={{once:true}}
                        className="image" style={backgroundImage}  />
                </div>
                </div>
                <div className="aboutShelter">
                    <div className="shelterContentWrap">
                    <div className="gallery"></div>
                    
                </div>
            </div>
        </div>

    )

}
export default ShelterDescription