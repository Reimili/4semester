<form action="" method="post">
        <div>
  
          <div>
            <label>Ф.И.О.
              <input name="name" type="text" class="input" placeholder="Фамилия Имя Отчество" />
            </label>
          </div>
  
          <div>
            <label>Номер Телефона
              <input type="tel" name="number" class="input" placeholder="+7(xxx)xxx-xx-xx"/>
            </label>
          </div>
  
          <div>
            <label>Электронная почта
              <input name="email" type="email" class="input" placeholder="veryhuman@mail.ru"/>
            </label>
          </div>
  
          <div>
            <label>Дата Рождения
              <input name="data" class="input" type="date" value="2004-03-14"/>
            </label>
          </div>
  
          <div>Пол<br>
            <div>
              <label>
                <input type="radio" name="radio" value="m"/>Мужской
              </label>
              <label>
                <input type="radio" name="radio" value="f"/>Женский
              </label>
            </div>
          </div>
  
          <div>
            <label class="input">Любимый язык программирования<br>
              <select  id="lang" name="lang[]" multiple="multiple">
                <option value="Pascal">Pascal</option>
                <option value="C">C</option>
                <option value="C++">C++</option>
                <option value="JavaScript">JavaScript</option>
                <option value="PHP">PHP</option>
                <option value="Python">Python</option>
                <option value="Java">Java</option>
                <option value="Haskel">Haskel</option>
                <option value="Clojure">Clojure</option>
                <option value="Scala">Scala</option>
              </select>
            </label>
          </div>
  
          <div>Биография <br>
            <label>
              <textarea class="input" name="biography" placeholder="Расскажите о себе"></textarea>
            </label>
          </div>
  
          <div>
            <label for="oznakomlen">
              C контрактом ознакомлен(а)<input type="checkbox" name="check_mark" id="oznakomlen"/>
            </label>
          </div>
  
          <button type="submit" class="form_button">Отправить</button>
        </div>
    </form>
  </body>
</html>