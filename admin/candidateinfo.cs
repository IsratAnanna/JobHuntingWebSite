using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Csejobs
{
    #region Candidateinfo
    public class Candidateinfo
    {
        #region Member Variables
        protected int _id;
        protected string _name;
        protected string _email;
        protected string _area;
        protected string _experience;
        protected string _skill;
        #endregion
        #region Constructors
        public Candidateinfo() { }
        public Candidateinfo(int id, string name, string email, string area, string experience, string skill)
        {
            this._id=id;
            this._name=name;
            this._email=email;
            this._area=area;
            this._experience=experience;
            this._skill=skill;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Name
        {
            get {return _name;}
            set {_name=value;}
        }
        public virtual string Email
        {
            get {return _email;}
            set {_email=value;}
        }
        public virtual string Area
        {
            get {return _area;}
            set {_area=value;}
        }
        public virtual string Experience
        {
            get {return _experience;}
            set {_experience=value;}
        }
        public virtual string Skill
        {
            get {return _skill;}
            set {_skill=value;}
        }
        #endregion
    }
    #endregion
}