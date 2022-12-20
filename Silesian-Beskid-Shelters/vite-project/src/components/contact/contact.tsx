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
                    name="contact"
                    method="post" 
                    data-netlify="true"
                    >
                        <input type='hidden' name='form-name' value='contact' />
                        <motion.input 
                        initial={{ x : -3000}}
                        whileInView={{ opacity: 1 }}
                        animate={{ x: 0 }}
                        transition={{ duration: 0.6}}
                        viewport={{once:true}}
                        
                        type="text" name='name' placeholder="Imię" />
                        <motion.input 
                        initial={{ x : -3000}}
                        whileInView={{ opacity: 1 }}
                        animate={{ x: 0 }}
                        transition={{duration: 0.7}}
                        viewport={{once:true}}
                        type="text" name='surname' placeholder="Nazwisko" />
                        <motion.input 
                        initial={{ x : -3000}}
                        whileInView={{ opacity: 1 }}
                        animate={{ x: 0 }}
                        transition={{duration: 0.8}}
                        viewport={{once:true}}
                        type="text" name='email' placeholder="Email" 
                        required
                        />
                        <motion.input 
                        initial={{ x : -3000}}
                        whileInView={{ opacity: 1 }}
                        animate={{ x: 0 }}
                        transition={{duration: 0.9}}
                        viewport={{once:true}}
                        type="text" name='topic'placeholder="Temat" 
                        required
                        />
                        <motion.textarea
                        initial={{ x : -3000}}
                        whileInView={{ opacity: 1 }}
                        animate={{ x: 0 }}
                        transition={{duration: 1.0}}
                        viewport={{once:true}}
                        name='message'placeholder="Treść wiadomości"
                        required
                        ></motion.textarea>
                        <motion.input 
                        initial={{ x : -3000}}
                        whileInView={{ opacity: 1 }}
                        animate={{ x: 0 }}
                        transition={{duration: 1.1}}
                        viewport={{once:true}}
                        type="submit" value="Wyślij" name='submit'  id='submit'/>
                      
                    </form>
                </div>
            </div>
            <Footer />
        </div>
        
    )
}
export default Contact