import { Component } from 'react';
import { render } from 'react-dom';
import Navbar from '../Nav/navbar'
import { useEffect } from 'react';
import { useState } from 'react';
import { motion } from "framer-motion"
import { AnimatePresence } from 'framer-motion';


const ShelterDescription = (prop : {shelter_image : string, image1 : string, image2 : string, head1 : string, head2 : string, text1 : string, text2 : string, secondText : boolean}) => {

    const secondText = prop.secondText;
    const shelter_image = prop.shelter_image;
    const backgroundImage = {
        backgroundImage: `url(${shelter_image})`,
    }
    const image1 = prop.image1;
    const backgroundImage1 = {
        backgroundImage: `url(${image1})`,
    }
    const image2 = prop.image2;
    const backgroundImage2 = {
        backgroundImage: `url(${image2})`,
    }
    const head1 = prop.head1;
    const head2 = prop.head2;
    const text1 = prop.text1;
    const text2 = prop.text2;

    let iteration = 0;
    let flag = true;
    if(iteration > 1)
        flag = false;

    if(secondText)
    {
        return(
            <div className="sWrapper">
                    <div className="headerShelter"><h1>O Schronisku</h1></div>
                    <div className="aboutShelter">
                        <motion.div className='shelterContentWrap'
                        initial={{ opacity: 0 }}
                        whileInView={{ opacity: 1 }}
                        transition={{ anticipation: 0.5, duration: 0.5 }}>
                            <div className="image" style={backgroundImage1}  />
                        <div className="text"><h4>{head1}</h4>{text1} </div>
                        </motion.div>
                    </div>
                    <div className="aboutShelter">
                        <motion.div className='shelterContentWrap'
                            initial={{ opacity: 0 }}
                            whileInView={{ opacity: 1 }}
                            transition={{ anticipation: 0.5, duration: 0.5 }}>
                        <div
                             className="text"><h4>{head2}</h4> 
                                {text2}
                        </div>
                        <div 
                            className="image" style={backgroundImage2}  />
                    </motion.div>
                    </div>
            </div>
        )
    }else{
        const additionalStyle = {
            marginBottom: "5rem"
        }
        return (
        <div className="sWrapper" style={additionalStyle}>
                    <div className="headerShelter"><h1>O Schronisku</h1></div>
                    <div className="aboutShelter">
                        <motion.div className='shelterContentWrap'
                        initial={{ opacity: 0 }}
                        whileInView={{ opacity: 1 }}
                        transition={{ anticipation: 0.5, duration: 0.5 }}>
                        <div className="image" style={backgroundImage1}  />
                        <div
                            className="text"><h4>{head1}</h4>{text1}
                        </div>
                        </motion.div>
                    </div>
        </div>
        )
    }
    

    

}
export default ShelterDescription