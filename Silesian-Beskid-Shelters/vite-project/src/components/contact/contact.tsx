import react from 'react';
import Navbar from '../Nav/navbar';
import Footer from '../Footer/footer';


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
                    onSubmit="submit"
                    >
                        <input type="text" id='name' placeholder="Imię" />
                        <input type="text" id='surname' placeholder="Nazwisko" />
                        <input type="text" id='email' placeholder="Email" />
                        <input type="text" id='topic 'placeholder="Temat" />
                        <textarea id='content'placeholder="Treść wiadomości"></textarea>
                        <input type="submit" value="Wyślij" id='submit' />
                      
                    </form>
                </div>
            </div>
            <Footer />
        </div>
        
    )
}
export default Contact