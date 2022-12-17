import react from 'react';
import Navbar from '../Nav/navbar';
import Footer from '../Footer/footer';
import { motion } from "framer-motion"


const Contact = () => {
    return(
        <div>
            <Navbar />
            <div className="contact">
                <div className="contactText">
                    <form 
                    name="contactv1"
                    method="post" 
                    data-netlify="true"
                    >
                        <motion.input 
                        initial={{ x : -3000}}
                        whileInView={{ opacity: 1 }}
                        animate={{ x: 0 }}
                        transition={{ duration: 0.6}}
                        viewport={{once:true}}
                        
                        type="text" id='name' placeholder="Imię" />
                        <motion.input 
                        initial={{ x : -3000}}
                        whileInView={{ opacity: 1 }}
                        animate={{ x: 0 }}
                        transition={{duration: 0.7}}
                        viewport={{once:true}}
                        type="text" id='surname' placeholder="Nazwisko" />
                        <motion.input 
                        initial={{ x : -3000}}
                        whileInView={{ opacity: 1 }}
                        animate={{ x: 0 }}
                        transition={{duration: 0.8}}
                        viewport={{once:true}}
                        type="text" id='email' placeholder="Email" />
                        <motion.input 
                        initial={{ x : -3000}}
                        whileInView={{ opacity: 1 }}
                        animate={{ x: 0 }}
                        transition={{duration: 0.9}}
                        viewport={{once:true}}
                        type="text" id='topic 'placeholder="Temat" />
                        <motion.textarea
                        initial={{ x : -3000}}
                        whileInView={{ opacity: 1 }}
                        animate={{ x: 0 }}
                        transition={{duration: 1.0}}
                        viewport={{once:true}}
                        id='content'placeholder="Treść wiadomości"></motion.textarea>
                        <motion.input 
                        initial={{ x : -3000}}
                        whileInView={{ opacity: 1 }}
                        animate={{ x: 0 }}
                        transition={{duration: 1.1}}
                        viewport={{once:true}}
                        type="submit" value="Wyślij" id='submit' />
                      
                    </form>
                </div>
            </div>
            <Footer />
        </div>
        
    )
}
export default Contact