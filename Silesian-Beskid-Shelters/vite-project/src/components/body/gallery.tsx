import React from "react";
import ReactDOM from "react-dom";
import { motion } from "framer-motion";
import { IMAGES } from "../../assets/images/gallery"

const Gallery = () => {
    return (
        <div className="gallery">
            <motion.div className="carousel">
                <motion.div className="inner-carousel">
                    {IMAGES.map((image) => {
                        return (
                            <motion.div
                                initial={{ opacity: 0 }}
                                animate={{ opacity: 1 }}
                                transition={{ delay: 0.5, duration: 0.5 }}
                                className="item"
                                style={{ backgroundImage: `url(${image.imageSrc})` }}
                            />
                        )
                    })}
                </motion.div>
            </motion.div>
        </div>
)}
export default Gallery;

